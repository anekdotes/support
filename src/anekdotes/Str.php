<?php namespace Anekdotes\Support;

/**
 * Contains helper functions used to manipulate strings
 */
class Str {

  /**
   * Determine if a given string starts with a given sub-string.
   *
   * @param  string        $haystack  String we're searching in
   * @param  string  $needle    Sub-String we're checking if it's at the start
   * @return bool                     If the sub-string is at the start of the haystack
   */
  public static function startsWith($haystack, $needle)
  {
    if (strlen($needle) == 0) return false;
    return strpos($haystack, $needle) === 0;
  }

  /**
   * Determine if a given string ends with a given sub-string.
   *
   * @param  string        $haystack  String we're searching in
   * @param  string  $needle    Sub-String we're checking if it's at the end
   * @return bool                     If the sub-string is at the end of the haystack
   */
  public static function endsWith($haystack, $needle)
  {
    return substr($haystack, -strlen($needle)) == $needle;
  }

  /**
   * Returns an array of strings, each of which is a substring of string formed by splitting it on boundaries formed by the string delimiter.
   * @param  string  $delimiter  The boundary string.
   * @param  string  $value      The input string.
   * @param  int     $limit      The maximum amount of elements in the string if positive (last element will not be axploded and contain the rest). If negative, it's the amount of elements to not return (starting at the end)
   * @return array               splitted array
   */
  public static function split($delimiter, $value, $limit=null) {
    if ($delimiter == '') return $value;
    if ($limit == null) {
      return explode($delimiter, $value);
    }
    else {
      return explode($delimiter, $value, $limit);
    }
  }

  /**
   * Convert a value to capitalized case.
   *
   * @param  string  $value  Value to be converted in capitalized case
   * @return string          Converted string
   */
  public static function capitalize($value) {
    return ucfirst($value);
  }

  /**
   * Convert a value to upper case.
   *
   * @param  string  $value  Value to be converted in upper case
   * @return string          Converted string
   */
  public static function upper($value) {
    return strtoupper($value);
  }

  /**
   * Convert a value to lower case.
   *
   * @param  string  $value  Value to be converted in lower case
   * @return string          Converted string
   */
  public static function lower($value) {
    return strtolower($value);
  }

  /**
   * Convert a value to snake case.
   *
   * @param  string  $value  Value to be converted in snake case
   * @return string          Converted string
   */
  public static function snakeCase($value) {
    $value = static::ascii($value);
    $pattern = '/(\w+)/';
    return preg_replace_callback($pattern, function($matches) {
        var_dump($matches);
        //return "{$matches[1]}_" . strtolower("{$matches[2]}");
      }, $value);
  }

  /**
   * Convert a value to camel case.
   *
   * @param  string  $value  Value to be converted in camel case
   * @return string          Converted string
   */
  public static function camelCase($value, $firstLower = false) {
    $val = str_replace(' ', '', ucwords(str_replace('_', ' ', $value)));
    if ($firstLower) $val = strtolower(substr($val,0,1)).substr($val,1);
    return $val;
  }

  /**
   * Determine if a given string contains a given sub-string.
   *
   * @param  string        $haystack  String we're searching in
   * @param  string|array  $needle    sub-string we're checking if it exists
   * @return bool                     If the substring exists
   */
  public static function contains($haystack, $needle)
  {
      foreach ((array) $needle as $n)
      {
          if (strpos($haystack, $n) !== false) return true;
      }

      return false;
  }

  /**
   * Convert a value to studly caps case.
   *
   * @param  string  $value  Value to be converted in studly case
   * @return string          Converted string
   */
  public static function studly($value)
  {
      $value = ucwords(str_replace(array('-', '_'), ' ', $value));

      return str_replace(' ', '', $value);
  }

  /**
   * Transliterate a UTF-8 value to ASCII.
   *
   * @param  string  $value  value to be transliterated
   * @return string          transliterated value
   */
  public static function ascii($value)
  {
    return \Patchwork\Utf8::toAscii($value);
  }

  /**
   * Generate a URL friendly "slug" from a given string.
   *
   * @param  string  $title      Value to obtain a slug from
   * @param  string  $separator  Character use to separate words
   * @return string              slugized value
   */
    public static function slug($title, $separator = '-')
    {
      $title = static::ascii($title);

      // Convert all dashes/undescores into separator
      $flip = $separator == '-' ? '_' : '-';

      $title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

      // Remove all characters that are not the separator, letters, numbers, or whitespace.
      $title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

      // Replace all separator characters and whitespace by a single separator
      $title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

      return trim($title, $separator);
    }

    /**
     * Generate a more truly "random" alpha-numeric string.
     *
     * @param  int     $length  Amount of characters in the string to obtain
     * @return string           Random string
     */
    public static function random($length = 16)
    {
      if (function_exists('openssl_random_pseudo_bytes'))
      {
        $bytes = openssl_random_pseudo_bytes($length * 2);

        if ($bytes === false)
        {
          throw new \RuntimeException('Unable to generate random string.');
        }

        return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
      }

      return static::quickRandom($length);
    }

    /**
     * Generate a "random" alpha-numeric string.
     *
     * Should not be considered sufficient for cryptography, etc.
     *
     * @param  int     $length  Amount of characters in the string to obtain
     * @return string           Random string
     */
    public static function quickRandom($length = 16)
    {
      $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

      return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }

    /**
     * Replace a sub-string by another in a given string
     * @param   string  $value       String we want to replace in
     * @param   string  $search      Value we want to replace
     * @param   string  $replacment  String we'll replace as
     * @return  string               The processed string
     */
    public static function replace($value, $search, $replacment)
    {
      return str_replace($search, $replacment, $value);
    }

    /**
     * Obtain matches from a Regex expression
     *
     * @param   string  $reg     Regex Expression we'll use for matching
     * @param   string  $str  String we're using against the regex expression
     * @param   int     $match   The index of the match we want in the expression
     * @return  string           The value of the matched expression
     */
    public static function regexResult($reg, $str, $match = 1)
    {
      preg_match($reg, $str, $matches);
      return $matches[$match];
    }

}
