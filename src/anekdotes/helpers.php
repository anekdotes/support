<?php
/**
  * This file contains functions that are called and then can be used as helpers.
  */
 if (!function_exists('array_dot')) {
     /**
     * Flatten a multi-dimensional associative array with dots. Taken and modified from Illuminate.
     *
     * @link   https://github.com/illuminate
     *
     * @param array  $array
     * @param string $prepend
     *
     * @return array
     */
    function array_dot($array, $prepend = '')
    {
        $results = [];
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $results = array_merge($results, array_dot($value, $prepend.$key.'.'));
            } else {
                $results[$prepend.$key] = $value;
            }
        }

        return $results;
    }
 }

 if (!function_exists('array_dot_get')) {
     /**
   * Get an item from an array using "dot" notation.
   *
   * @param   array   $array  array we're working on
   * @param   string  $key    key we want to get in the array, in the following format "key1.key2.key3"
   *
   * @return  mixed           obtained value
   */
  function array_dot_get($array, $key)
  {
      if (is_null($key)) {
          return $array;
      }
      if (isset($array[$key])) {
          return $array[$key];
      }
      $explodedKey = explode('.', $key);
      $sk = count($explodedKey);
      $return = [];
      foreach ($array as $node => $value) {
          if (\Anekdotes\Support\Str::startsWith($node, $key)) {
              $explodedNodeName = explode('.', $node);
              $sn = count($explodedNodeName);
              if ($sn > $sk + 1) {
                  $newNodeName = $explodedNodeName[$sk];
                  $return[$newNodeName] = array_dot_get($array, $key.'.'.$newNodeName);
              } else {
                  $return[$explodedNodeName[$sn - 1]] = $value;
              }
          }
      }

      return $return;
  }
 }

if (!function_exists('html_style_tag')) {
    /**
   * Create a stylesheet tag, with the path to the sheet provided.
   *
   * @param  string  $path   Path to the style sheet
   * @param  string  $media  Value to put in the "media" value of the html tag
   *
   * @return string          The HTML style link tag
   */
  function html_style_tag($path, $media = 'screen')
  {
      $html = '<link rel="stylesheet" href="';
      $html .= $path;
      $html .= '" media="'.$media.'" />';

      return $html;
  }
}

if (!function_exists('html_script_tag')) {
    /**
   * Create an HTML script tag, with the path to the script provided.
   *
   * @param  string  $path   Path to the script
   * @param  array   $opts   Additionnal option values to be added to the tag
   *
   * @return string          The HTML script tag
   */
  function html_script_tag($path, $opts = [])
  {
      $html = '<script src="/';
      $html .= 'assets/';
      $html .= $path;
      $html .= '"';
      if (!array_key_exists('type', $opts)) {
          $html .= ' type="text/javascript"';
      }
      foreach ($opts as $key => $value) {
          $html .= " $key=\"$value\"";
      }
      $html .= '></script>';

      return $html;
  }
}

if (!function_exists('array_dot_expand')) {

  /**
   * Expands a dot notation array to multi dimensinnal array.
   *
   * In other words, splits the array on the key values to make it multi-dimensional
   *
   * Ex : an array defined as array("Toaster.me.k" => "string.a","patate" => "three") would end up as array("toaster" => array("me" => array("k" => "string.a")),patate => "three")
   */
  function array_dot_expand($arr, $divider_char = '.')
  {
      if (!is_array($arr)) {
          return false;
      }

      $split = '/'.preg_quote($divider_char, '/').'/';

      $ret = [];
      foreach ($arr as $key => $val) {
          $parts = preg_split($split, $key, -1, PREG_SPLIT_NO_EMPTY);
          $leafpart = array_pop($parts);
          $parent = &$ret;
          foreach ($parts as $part) {
              if (!isset($parent[$part])) {
                  $parent[$part] = [];
              } elseif (!is_array($parent[$part])) {
                  $parent[$part] = [];
              }
              $parent = &$parent[$part];
          }

          if (empty($parent[$leafpart])) {
              $parent[$leafpart] = $val;
          }
      }

      return $ret;
  }
}

if (!function_exists('str_contains')) {
    /**
   * Determine if a given string contains a given sub-string.
   *
   * @param  string        $haystack  String we're searching in
   * @param  string  $needle    sub-string we're checking if it exists
   *
   * @return bool                     If the substring exists
   */
  function str_contains($haystack, $needle)
  {
      return \Anekdotes\Support\Str::contains($haystack, $needle);
  }
}

if (!function_exists('starts_with')) {
    /**
   * Determine if a given string starts with a given sub-string.
   *
   * @param  string        $haystack  String we're searching in
   * @param  string|array  $needle    Sub-String we're checking if it's at the start
   *
   * @return bool                     If the sub-string is at the start of the haystack
   */
  function starts_with($haystack, $needle)
  {
      return \Anekdotes\Support\Str::startsWith($haystack, $needle);
  }
}

if (!function_exists('studly_case')) {
    /**
   * Convert a value to studly caps case.
   *
   * @param  string  $value  Value to be converted in studly case
   *
   * @return string          Converted string
   */
  function studly_case($value)
  {
      return \Anekdotes\Support\Str::studly($value);
  }
}

if (!function_exists('snake_case')) {
    /**
   * Convert a value to snake case.
   *
   * @param  string  $value  Value to be converted in snake case
   *
   * @return string          Converted string
   */
  function snake_case($value)
  {
      return \Anekdotes\Support\Str::snakeCase($value);
  }
}

if (!function_exists('camel_case')) {
    /**
   * Convert a value to camel case.
   *
   * @param  string  $value  Value to be converted in camel case
   *
   * @return string          Converted string
   */
  function camel_case($value)
  {
      return \Anekdotes\Support\Str::camelCase($value);
  }
}

if (!function_exists('str_plural')) {
    /**
   * Convert a value to it's plural form.
   *
   * Currently only adds an s.
   *
   * @param  string  $value  Value to have a plural form added
   *
   * @return string          Plural form of the value
   */
  function str_plural($value)
  {
      return $value.'s';
  }
}

if (!function_exists('str_slug')) {
    /**
   * Get a slugized form of a string.
   *
   * @param  string  $value  Value to obtain a slug from
   *
   * @return string          slugized value
   */
  function str_slug($value)
  {
      return \Anekdotes\Support\Str::slug($value);
  }
}

/**
 * Check if value is between 2 other value.
 *
 * @param int $val The value to compare
 * @param int $min The mininum value
 * @param int $max The maximum value
 *
 * @return bool If the compared value is in between
 */
function between($val, $min, $max)
{
    return $val >= $min && $val <= $max;
}

/**
 * Get either a Gravatar URL or complete image tag for a specified email address.
 *
 * @param string $email The email address
 * @param string $s     Size in pixels, defaults to 80px [ 1 - 2048 ]
 * @param string $d     Default imageset to use [ 404 | mm | identicon | monsterid | wavatar ]
 * @param string $r     Maximum rating (inclusive) [ g | pg | r | x ]
 * @param bool   $img   True to return a complete IMG tag False for just the URL
 * @param array  $atts  Optional, additional key/value attributes to include in the IMG tag
 *
 * @return string containing either just a URL or a complete image tag
 * @source  http://gravatar.com/site/implement/images/php/
 */
function get_gravatar($email, $s = 80, $d = 'identicon', $r = 'r', $img = false, $atts = [])
{
    $url = 'http://www.gravatar.com/avatar/';
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="'.$url.'"';
        foreach ($atts as $key => $val) {
            $url .= ' '.$key.'="'.$val.'"';
        }
        $url .= ' />';
    }

    return $url;
}

if (!function_exists('array_column')) {

  /**
   * Returns the values from a single column of the input array, identified by
   * the $columnKey.
   *
   * Exemple : If $input = array(array("id" => 1,"toaster_id" => 1),array("id"=3,"toaster_id"=2)) and $columnkey = "toaster_id", array_column($input,$columnkey) will return array(1,2)
   *
   * @param  $input      array           the array we want the column of
   * @param  $columnKey  string|integer  the key of the column we want
   * @param  $indexKey   string|integer  the column that needs to be used as the key of the returned array_column
   *
   * @return array                        Array of the column.
   */
  function array_column($input = null, $columnKey = null, $indexKey = null)
  {
      $argc = func_num_args();
      $params = func_get_args();
      if ($argc < 2) {
          trigger_error("array_column() expects at least 2 parameters, {$argc} given", E_USER_WARNING);

          return;
      }
      if (!is_array($params[0])) {
          trigger_error('array_column() expects parameter 1 to be array, '.gettype($params[0]).' given', E_USER_WARNING);

          return;
      }
      if (!is_int($params[1])
        && !is_float($params[1])
        && !is_string($params[1])
        && $params[1] !== null
        && !(is_object($params[1]) && method_exists($params[1], '__toString'))
    ) {
          trigger_error('array_column(): The column key should be either a string or an integer', E_USER_WARNING);

          return false;
      }
      if (isset($params[2])
        && !is_int($params[2])
        && !is_float($params[2])
        && !is_string($params[2])
        && !(is_object($params[2]) && method_exists($params[2], '__toString'))
    ) {
          trigger_error('array_column(): The index key should be either a string or an integer', E_USER_WARNING);

          return false;
      }
      $paramsInput = $params[0];
      $paramsColumnKey = ($params[1] !== null) ? (string) $params[1] : null;
      $paramsIndexKey = null;
      if (isset($params[2])) {
          if (is_float($params[2]) || is_int($params[2])) {
              $paramsIndexKey = (int) $params[2];
          } else {
              $paramsIndexKey = (string) $params[2];
          }
      }
      $resultArray = [];
      foreach ($paramsInput as $row) {
          $key = $value = null;
          $keySet = $valueSet = false;
          if ($paramsIndexKey !== null && array_key_exists($paramsIndexKey, $row)) {
              $keySet = true;
              $key = (string) $row[$paramsIndexKey];
          }
          if ($paramsColumnKey === null) {
              $valueSet = true;
              $value = $row;
          } elseif (is_array($row) && array_key_exists($paramsColumnKey, $row)) {
              $valueSet = true;
              $value = $row[$paramsColumnKey];
          }
          if ($valueSet) {
              if ($keySet) {
                  $resultArray[$key] = $value;
              } else {
                  $resultArray[] = $value;
              }
          }
      }

      return $resultArray;
  }
}
