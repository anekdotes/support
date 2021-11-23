<?php

namespace Tests;

use Anekdotes\Support\Arr;
use PHPUnit\Framework\TestCase;

final class ArrTest extends TestCase
{
    public $dummies = ['id' => 1, 'title' => 'Yasir', 'city' => 'Hamilton', 'country' => 'Jordan', 'phone' => '1-985-616-0794', 'company' => 'Euismod Urna Nullam Ltd', 'pin' => '4596', 'word' => 'tincidunt', 'price' => '$58.20', 'postal' => 'V1N 0N0', 'date' => '2015-05-08 10:45:12'];

    public $dummies2 = [
        ['id' => 1, 'name' => 'Bell', 'phone' => '1-612-691-7976', 'email' => 'mi@quis.ca'],
        ['id' => 2, 'name' => 'Lani', 'phone' => '1-928-841-0994', 'email' => 'sit.amet.consectetuer@fermentum.net'],
        ['id' => 3, 'name' => 'Demetria', 'phone' => '1-371-930-6543', 'email' => 'magna.Nam.ligula@faucibus.edu'],
        ['id' => 4, 'name' => 'Nita', 'phone' => '1-645-982-2807', 'email' => 'tellus.Phasellus@dolor.org'],
        ['id' => 5, 'name' => 'Ariel', 'phone' => '1-842-393-2881', 'email' => 'ultrices.iaculis@cursusa.com'],
        ['id' => 6, 'name' => 'Megan', 'phone' => '1-448-521-4816', 'email' => 'diam.at@ac.net'],
        ['id' => 7, 'name' => 'Carissa', 'phone' => '1-824-350-4996', 'email' => 'rutrum@diamPellentesque.org'],
        ['id' => 8, 'name' => 'Karina', 'phone' => '1-918-481-0330', 'email' => 'ultrices.Duis@dui.co.uk'],
        ['id' => 9, 'name' => 'Camille', 'phone' => '1-963-983-4402', 'email' => 'pellentesque.tellus@eu.ca'],
        ['id' => 10, 'name' => 'Piper', 'phone' => '1-649-286-2603', 'email' => 'tincidunt.orci.quis@egestasSed.net'],
    ];

    public $dummies3 = [
      ['id' => 1],
      ['id' => 5],
      ['id' => 3],
      ['id' => 4],
      ['id' => 2],
    ];

    public $dummies3ASC = [
      ['id' => 1],
      ['id' => 2],
      ['id' => 3],
      ['id' => 4],
      ['id' => 5],
    ];

    public $dummies3DESC = [
      ['id' => 5],
      ['id' => 4],
      ['id' => 3],
      ['id' => 2],
      ['id' => 1],
    ];

    //test array and empty sortByKey arr method
    public function testSortByKey1()
    {
        $this->assertNotEmpty(Arr::sortByKey($this->dummies3, []));
    }

    //test empty and empty (array) sortByKey arr method
    public function testSortByKey2()
    {
        $this->assertEmpty(Arr::sortByKey([], []));
    }

    //test empty and empty (string) sortByKey arr method
    public function testSortByKey3()
    {
        $this->assertEmpty(Arr::sortByKey([], ''));
    }

    //test ASC sorting sortByKey arr method
    public function testSortByKey4()
    {
        $this->assertEquals(Arr::sortByKey($this->dummies3, 'id'), $this->dummies3ASC);
    }

    //test DESC sorting sortByKey arr method
    public function testSortByKey5()
    {
        $this->assertEquals(Arr::sortByKey($this->dummies3, 'id', SORT_DESC), $this->dummies3DESC);
    }

    //test existing on get arr method
    public function testExistingGet()
    {
        $this->assertTrue(Arr::get($this->dummies, 'company') != '');
    }

    //test not existing on get arr method
    public function testNotExistingGet()
    {
        $this->assertNull(Arr::get($this->dummies, 'potato'));
    }

    //test not existing with default value on get arr method
    public function testNotExistingDefaultGet()
    {
        $this->assertTrue(Arr::get($this->dummies, 'potato', 'not empty') != '');
    }

    //test existing on getWhere arr method
    public function testExistingGetWhere()
    {
        $this->assertNotEmpty(Arr::getWhere($this->dummies2, 'name', 'Lani'));
    }

    //test not existing on getWhere arr method
    public function testNotExistingGetWhere()
    {
        $this->assertEmpty(Arr::getWhere($this->dummies2, 'harry', 'potter'));
    }

    //test existing on getWhere arr method
    public function testNotExistingDefaultGetWhere()
    {
        $this->assertNotEmpty(Arr::getWhere($this->dummies2, 'harry', 'potter', [1, 2, 3, 4, 5]));
    }

    //test true on exists arr method
    public function testTrueExists()
    {
        $this->assertTrue(Arr::exists('id', $this->dummies));
    }

    //test false on exists arr method
    public function testFalseExists()
    {
        $this->assertFalse(Arr::exists('potato', $this->dummies));
    }

    //test true on exists arr method
    public function testTrueRemove()
    {
        Arr::remove('id', $this->dummies);
        $this->assertEquals(count($this->dummies), 10);
    }

    //test false on exists arr method
    public function testFalseRemove()
    {
        Arr::remove('potato', $this->dummies);
        $this->assertEquals(count($this->dummies), 11);
    }
}
