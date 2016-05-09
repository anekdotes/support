<?php

namespace Tests;

use PHPUnit_Framework_TestCase;

class HelpersTest extends PHPUnit_Framework_TestCase
{
    //test array_dot helpers function
    public function testArrayDot1()
    {
      $this->assertTrue(true);
    }

    //test array_dot_get helpers function
    public function testArrayDotGet1()
    {
      $this->assertTrue(true);
    }

    //test html_style_tag helpers function
    public function testHtmlStyleTag1()
    {
      $this->assertEquals(html_style_tag('/test'), '<link rel="stylesheet" href="/test" media="screen" />');
    }

    //test html_script_tag helpers function
    public function testHtmlScriptTag1()
    {
      $this->assertEquals(html_script_tag('/test'), '<script src="/assets//test" type="text/javascript"></script>');
    }

    //test html_script_tag helpers function
    public function testHtmlScriptTag2()
    {
      $this->assertEquals(html_script_tag('/test', ['async' => null]), '<script src="/assets//test" type="text/javascript" async=""></script>');
    }

    //test array_dot_expand helpers function
    public function testArrayDotExpand1()
    {
      $this->assertTrue(true);
    }

    //test str_contains helpers function
    public function testStrContains1()
    {
      $this->assertTrue(str_contains('foo', 'oo'));
    }

    //test str_contains helpers function
    public function testStrContains2()
    {
      $this->assertFalse(str_contains('foo', 'y'));
    }

    //test starts_with helpers function
    public function testStartsWith1()
    {
      $this->assertTrue(starts_with('foo', 'f'));
    }

    //test starts_with helpers function
    public function testStartsWith2()
    {
      $this->assertFalse(starts_with('foo', 'y'));
    }

    //test studly_case helpers function
    public function testStudlyCase1()
    {
      $this->assertEquals(studly_case('foo'), 'Foo');
    }

    //test studly_case helpers function
    public function testStudlyCase2()
    {
      $this->assertEquals(studly_case('foo bar'), 'FooBar');
    }

    //test snake_case helpers function
    public function testSnakeCase1()
    {
      $this->assertEquals(snake_case('foo'), 'foo');
    }

    //test snake_case helpers function
    public function testSnakeCase2()
    {
      $this->assertEquals(snake_case('foo bar'), 'foo_bar');
    }

    //test camel_case helpers function
    public function testCamelCase1()
    {
      $this->assertEquals(camel_case('foo'), 'foo');
    }

    //test camel_case helpers function
    public function testCamelCase2()
    {
      $this->assertEquals(camel_case('foo bar'), 'fooBar');
    }

    //test str_plural helpers function
    public function testStrPlural1()
    {
      $this->assertEquals(str_plural('foo'), 'foos');
    }

    //test str_slug helpers function
    public function testSlug1()
    {
      $this->assertEquals(str_slug('foo'), 'foo');
    }

    //test str_slug helpers function
    public function testSlug2()
    {
      $this->assertEquals(str_slug('foo bar'), 'foo-bar');
    }

    //test str_slug helpers function
    public function testSlug3()
    {
      $this->assertEquals(str_slug('fôô bar'), 'foo-bar');
    }

    //test between helpers function
    public function testBetween1()
    {
      $this->assertTrue(between(5, 1, 10));
    }

    //test between helpers function
    public function testBetween2()
    {
      $this->assertFalse(between(11, 1, 10));
    }

    //test get_gravatar helpers function
    public function testGravatar1()
    {
      $this->assertTrue(get_gravatar('mathieu.gosselin@anekdotes.com') != '');
    }

    //test array_column helpers function
    public function testArrayColumn1()
    {
      $this->assertEquals(array_column([['id' => 1], ['id' => 2], ['id' => 3]], 'id'), [1, 2, 3]);
    }

}
