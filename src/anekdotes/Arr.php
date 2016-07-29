<?php

namespace Anekdotes\Support;

/**
 * Helper class which facilitates array manipulation.
 */
class Arr
{
    /**
   * Sort the array by an object's key value.
   *
   * @param   array   $data       The array to sort
   * @param   string  $sortKey    On which object's key the array must be sorted
   * @param   \enum   $sort_flags Either SORT_ASC or SORT_DESC. Defines if the sort is ascending or descending
   *
   * @return  array               The ordered array
   */
  public static function sortByKey($data, $sortKey, $sort_flags = SORT_ASC)
  {
      if (empty($data) or empty($sortKey)) {
          return $data;
      }

      $ordered = [];
      $i = 0;
      foreach ($data as $key => $value) {
          $i++;
          $ordered[$value[$sortKey].'-'.$i] = $value;
      }

      switch ($sort_flags) {
      case SORT_ASC:
        ksort($ordered, SORT_NUMERIC);
      break;
      case SORT_DESC:
        krsort($ordered, SORT_NUMERIC);
      break;
    }

      return array_values($ordered);
  }

  /**
   * Get an item in the array, with a default value if the key doesn't exist.
   *
   * @param  array   $array    Array to get in
   * @param  string  $key      Key of the object we're trying to get
   * @param  mixed   $default  Default value in case the key does not exist
   *
   * @return mixed             Value found in the array (or default)
   */
  public static function get($array, $key, $default = null)
  {
      if (array_key_exists($key, $array)) {
          return $array[$key];
      } else {
          return $default;
      }
  }

  /**
   * Get an object in the array where its key is the same as the search value.
   *
   * @param   array   $array    Array to search in
   * @param   string  $key      Key we're searching on
   * @param   mixed   $search   Value we're searching in the object
   * @param   mixed   $default  Default value in case no boject has the matching value for its key
   *
   * @return  mixed             Found object
   */
  public static function getWhere($array, $key, $search, $default = null)
  {
      foreach ($array as $item) {
          if (isset($item[$key]) && $item[$key] == $search) {
              return $item;
          }
      }

      return $default;
  }

  /**
   * Check if a key exists in the provided array.
   *
   * @param   string  $key    Key we're trying to find
   * @param   array   $array  Array we're searching on
   *
   * @return  bool            If the key exists
   */
  public static function exists($key, $array)
  {
      return array_key_exists($key, $array);
  }

  /**
   * Remove an object at a defined key in an array.
   *
   * @param   string  $key    Key of the object we want to remove
   * @param   array   $array  Array we're working on
   */
  public static function remove($key, &$array)
  {
      if (static::exists($key, $array)) {
          unset($array[$key]);
      }
  }

  /**
   * Shuffles the array using a Seed.
   *
   * @param   array  $array  Array we're shuffling
   * @param   int    $seed   Seed we're using to shuffle
   * @link   https://en.wikipedia.org/wiki/Fisher–Yates_shuffle
   */
  public static function seedShuffle(&$array, $seed)
  {
      @mt_srand($seed);
      for ($i = count($array) - 1; $i > 0; $i--)
      {
          $j = @mt_rand(0, $i);
          $tmp = $array[$i];
          $array[$i] = $array[$j];
          $array[$j] = $tmp;
      }
  }
}
