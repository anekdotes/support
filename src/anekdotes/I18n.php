<?php

namespace Anekdotes\Support;

/**
 * This class contains Internationalization methods, to be able to enable easy localization for varying languages.
 *
 * Internationalization is often written i18n, where 18 is the number of letters between i and n in the English word.
 */
class I18n
{
    /**
   * The locale the client is current using.
   *
   * @var string
   */
  private $currentLocale;

  /**
   * All the locales supported by the application.
   *
   * @var array
   */
  private $supportedLocales = [];

  /**
   * Contains all translations to be used.
   *
   * @var array
   */
  private $translations = [];

  /**
   * Instanciates the class and sets its default locale.
   *
   * @param  string  $defaultLocale  Default locale
   */
  public function __construct($defaultLocale = '')
  {
      $this->currentLocale = $defaultLocale;
  }

  /**
   * Obtain current locale.
   *
   * @return  string  Current locale
   */
  public function getLocale()
  {
      return $this->currentLocale;
  }

  /**
   * Set current locale.
   *
   * @param  string  $locale  Locale to be set
   */
  public function setLocale($locale)
  {
      $this->currentLocale = $locale;
  }

  /**
   * OBtain the array of all supported localed in the application.
   *
   * @return  array  all supported localed in the application
   */
  public function getSupportedLocales()
  {
      return $this->supportedLocales;
  }

  /**
   * Set application supported locales.
   *
   * @param  array  $locales  array of locales to be set
   */
  public function setSupportedLocales(array $locales)
  {
      $this->supportedLocales = $locales;
  }

  /**
   * Load files in a folder to use as translations.
   *
   * @param  string  $path       Path to the folder
   * @param  string  $namespace  Namespace the folder is in
   */
  public function loadFolder($path, $namespace = '__main__')
  {
      if (is_dir($path)) {
          $files = glob($path.'*.php');
          if (!defined('DS')) {
              define('DS', DIRECTORY_SEPARATOR);
          }
          foreach ($files as $file) {
              $shell = explode(DS, $file);
              $fileName = end($shell);
              $fileName = explode('.', $fileName, -1);
              $prefix = '';
              if (count($fileName) == 2) {
                  $prefix = reset($fileName).'.';
                  $locale = end($fileName);
              } else {
                  $locale = end($fileName);
              }
              $translations = require $file;
              $translations = array_dot($translations, $prefix);

              // merge $namespace arrays with prefixed arrays if exists
              if (isset($this->translations[$locale])) {
                  if (isset($this->translations[$locale][$namespace])) {
                      $translations = array_merge($this->translations[$locale][$namespace], $translations);
                  }
              }

              // Save the values in our instance array
              $this->translations[$locale][$namespace] = $translations;
          }
      }
  }

  /**
   * Give the proper translation based on the locale.
   *
   * @param  string  Here are a lot of parameters. Each parameter corresponds to a translation, in order in which they are in supported locales
   *
   * @return string  The string corresponding to the current locale
   */
  public function t()
  {
      $args = func_get_args();
      $locales = count($this->supportedLocales);

      if (empty($args)) {
          return '';
      }

      if ($locales == 0) {
          return '';
      }

      if ($locales != count($args)) {
          $args = array_slice($args, 0, $locales);
      }

      if ($locales - count($args) > 0) {
          $args = array_merge($args, array_fill(0, $locales - count($args), ''));
      }

      $translations = array_combine($this->supportedLocales, $args);

      return $translations[$this->currentLocale];
  }

  /**
   * Fetches the translation of the key based on the current locale.
   *
   * @param  string  $key     translation to obtain
   * @param  array   $values  Values to be replaced in the translation string
   *
   * @return string           Translated value
   */
  public function dt($key, $values = [])
  {
      $namespace = '__main__';
      if (Str::contains($key, '::')) {
          list($namespace, $key) = explode('::', $key);
      }

      if (empty($this->translations)) {
          return '';
      }

      $loc = $this->getLocale();

      if (array_key_exists($namespace, $this->translations[$loc]) &&
      array_key_exists($key, $this->translations[$loc][$namespace])) {
          $translation = $this->translations[$loc][$namespace][$key];
          foreach ($values as $name => $value) {
              $translation = str_replace(':'.$name, $value, $translation);
          }

          return $translation;
      } else {
          return '';
      }
  }
}
