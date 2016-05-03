<?php

namespace Tests;

use Anekdotes\Support\Str;
use PHPUnit_Framework_TestCase;

class StrTest extends PHPUnit_Framework_TestCase
{
    //test startsWith str method
    public function testStartsWith1()
    {
        $this->assertTrue(Str::startsWith('foo', 'f'));
    }

    //test startsWith str method
    public function testStartsWith2()
    {
        $this->assertFalse(Str::startsWith('foo', 'y'));
    }

    //test startsWith str method
    public function testStartsWith3()
    {
        $this->assertFalse(Str::startsWith('foo', ''));
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
        $this->assertEquals(Str::snakeCase('étoile filante'), 'etoile_filante');
    }

    //test snakeCase str method
    public function testSnakeCase2()
    {
        $this->assertEquals(Str::snakeCase('foo bar'), 'foo_bar');
    }

    //test camelCase str method
    public function testCamelCase1()
    {
        $this->assertEquals(Str::camelCase('foo bar'), 'fooBar');
    }

    //test camelCase str method
    public function testCamelCase2()
    {
        $this->assertEquals(Str::camelCase('Foo bar'), 'fooBar');
    }

    //test camelCase str method
    public function testCamelCase3()
    {
        $this->assertEquals(Str::camelCase('foobar'), 'foobar');
    }

    //test camelCase str method
    public function testCamelCase4()
    {
        $this->assertEquals(Str::camelCase('foo_bar'), 'fooBar');
    }

    //test camelCase str method
    public function testCamelCase5()
    {
        $this->assertEquals(Str::camelCase('foo-bar'), 'fooBar');
    }

    //test contains str method
    public function testContains1()
    {
        $this->assertTrue(Str::contains('foo', 'oo'));
    }

    //test contains str method
    public function testContains2()
    {
        $this->assertTrue(Str::contains('foo', ['y', 'o']));
    }

    //test contains str method
    public function testContains3()
    {
        $this->assertFalse(Str::contains('foo', 'y'));
    }

    //test contains str method
    public function testContains4()
    {
        $this->assertFalse(Str::contains('foo', ['y', 'b']));
    }

    //test studly str method
    public function testStudly1()
    {
        $this->assertEquals(Str::studly('foo'), 'Foo');
    }

    //test studly str method
    public function testStudly2()
    {
        $this->assertEquals(Str::studly('foo bar'), 'FooBar');
    }

    //test studly str method
    public function testStudly3()
    {
        $this->assertEquals(Str::studly('foo_bar'), 'FooBar');
    }

    //test studly str method
    public function testStudly4()
    {
        $this->assertEquals(Str::studly('foo-bar'), 'FooBar');
    }

    //test studly str method
    public function testStudly5()
    {
        $this->assertEquals(Str::studly('Foobar'), 'Foobar');
    }

    //test ascii str method
    public function testAscii1()
    {
        $this->assertEquals(Str::ascii('étoile'), 'etoile');
    }

    //test ascii str method
    public function testAscii2()
    {
        $this->assertEquals(Str::ascii('etoile'), 'etoile');
    }

    //test ascii str method
    public function testAscii3()
    {
        $this->assertEquals(Str::ascii('arrête'), 'arrete');
    }

    //test ascii str method
    public function testAscii4()
    {
        $this->assertEquals('L\'avion', 'L\'avion');
    }

    //test slug str method
    public function testSlug1()
    {
        $this->assertEquals(Str::slug('étoile'), 'etoile');
    }

    //test slug str method
    public function testSlug2()
    {
        $this->assertEquals(Str::slug('L\'avion'), 'lavion');
    }

    //test slug str method
    public function testSlug3()
    {
        $this->assertEquals(Str::slug('foo bar'), 'foo-bar');
    }

    //test random str method
    public function testRandom1()
    {
        $this->assertTrue(Str::random() != '');
    }

    //test random str method
    public function testRandom2()
    {
        $this->assertTrue(strlen(Str::random()) == 16, 'The default $limit parameter of random method is no longer 16.');
    }

    //test random str method
    public function testRandom3()
    {
        $this->assertTrue(Str::random(5) != '');
    }

    //test random str method
    public function testRandom4()
    {
        $this->assertTrue(strlen(Str::random(5)) == 5);
    }

    //test quickRandom str method
    public function testQuickRandom1()
    {
        $this->assertTrue(Str::quickRandom() != '');
    }

    //test quickRandom str method
    public function testQuickRandom2()
    {
        $this->assertTrue(strlen(Str::quickRandom()) == 16, 'The default $limit parameter of quickRandom method is no longer 16.');
    }

    //test quickRandom str method
    public function testQuickRandom3()
    {
        $this->assertTrue(Str::quickRandom(5) != '');
    }

    //test quickRandom str method
    public function testQuickRandom4()
    {
        $this->assertTrue(strlen(Str::quickRandom(5)) == 5);
    }

    //test replace str method
    public function testReplace1()
    {
        $this->assertEquals(Str::replace('foo', 'oo', 'yy'), 'fyy');
    }

    //test replace str method
    public function testReplace2()
    {
        $this->assertEquals(Str::replace('foo', 'o', 'y'), 'fyy');
    }

    //test replace str method
    public function testReplace3()
    {
        $this->assertEquals(Str::replace('foo', 'y', 'o'), 'foo');
    }

    //test regexResult str method
    public function testRegexResult1()
    {
        $this->assertEquals(Str::regexResult('/([\w]+)/', 'foo bar', 0), ['foo', 'bar']);
    }
}
