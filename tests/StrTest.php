<?php namespace Tests;
use PHPUnit_Framework_TestCase; use Anekdotes\Support\Str;

class StrTest extends PHPUnit_Framework_TestCase
{
    //test true startsWith str method
    public function testTrueStartsWith()
    {
      $this->assertTrue(Str::startsWith('foo', 'f'));
    }

    //test false startsWith str method
    public function testFalseStartsWith()
    {
      $this->assertFalse(Str::startsWith('foo', 'y'));
    }

    //test true endsWith str method
    public function testTrueEndsWith()
    {
      $this->assertTrue(Str::endsWith('foo', 'o'));
    }

    //test false endsWith str method
    public function testFalseEndsWith()
    {
      $this->assertFalse(Str::endsWith('foo', 'y'));
    }

    //test not empty split str method
    public function testSplit1()
    {
      $this->assertNotEmpty(Str::split(',', '1,2,3,4,5'));
    }

    //test is equals string split str method
    public function testSplit2()
    {
      $this->assertEquals(Str::split('', '1,2,3,4,5'), '1,2,3,4,5');
    }

    //test not empty limit split str method
    public function testSplit3()
    {
      $this->assertEquals(count(Str::split(',', '1,2,3,4,5', 2)), 2);
    }

    //test capitalize str method
    public function testCapitalize()
    {
      $this->assertEquals(Str::capitalize('foo'), 'Foo');
    }

    //test upper str method
    public function testUpper()
    {
      $this->assertEquals(Str::upper('foo'), 'FOO');
    }

    //test lower str method
    public function testLower()
    {
      $this->assertEquals(Str::lower('foo'), 'foo');
    }

    //test snakeCase str method
    public function testSnakeCase1()
    {
      var_dump(Str::snakeCase('foo bar'));
      //$this->assertEquals(Str::snakeCase('foo bar'), 'foo_bar');
    }

}
