<?php namespace Tests;
use PHPUnit_Framework_TestCase; use Anekdotes\Support\Arr;

class ArrTest extends PHPUnit_Framework_TestCase
{

    public $dummies = array("id"=>1,"title"=>"Yasir","city"=>"Hamilton","country"=>"Jordan","phone"=>"1-985-616-0794","company"=>"Euismod Urna Nullam Ltd","pin"=>"4596","word"=>"tincidunt","price"=>"$58.20","postal"=>"V1N 0N0","date"=>"2015-05-08 10:45:12");

    public $dummies2 = array(
    	array("id"=>1,"name"=>"Bell","phone"=>"1-612-691-7976","email"=>"mi@quis.ca"),
    	array("id"=>2,"name"=>"Lani","phone"=>"1-928-841-0994","email"=>"sit.amet.consectetuer@fermentum.net"),
    	array("id"=>3,"name"=>"Demetria","phone"=>"1-371-930-6543","email"=>"magna.Nam.ligula@faucibus.edu"),
    	array("id"=>4,"name"=>"Nita","phone"=>"1-645-982-2807","email"=>"tellus.Phasellus@dolor.org"),
    	array("id"=>5,"name"=>"Ariel","phone"=>"1-842-393-2881","email"=>"ultrices.iaculis@cursusa.com"),
    	array("id"=>6,"name"=>"Megan","phone"=>"1-448-521-4816","email"=>"diam.at@ac.net"),
    	array("id"=>7,"name"=>"Carissa","phone"=>"1-824-350-4996","email"=>"rutrum@diamPellentesque.org"),
    	array("id"=>8,"name"=>"Karina","phone"=>"1-918-481-0330","email"=>"ultrices.Duis@dui.co.uk"),
    	array("id"=>9,"name"=>"Camille","phone"=>"1-963-983-4402","email"=>"pellentesque.tellus@eu.ca"),
    	array("id"=>10,"name"=>"Piper","phone"=>"1-649-286-2603","email"=>"tincidunt.orci.quis@egestasSed.net")
    );

    public $dummies3 = array(
      array('id'=>1),
      array('id'=>5),
      array('id'=>3),
      array('id'=>4),
      array('id'=>2)
    );

    public $dummies3ASC = array(
      array('id'=>1),
      array('id'=>2),
      array('id'=>3),
      array('id'=>4),
      array('id'=>5)
    );

    public $dummies3DESC = array(
      array('id'=>5),
      array('id'=>4),
      array('id'=>3),
      array('id'=>2),
      array('id'=>1)
    );

    //test array and empty sortByKey arr method
    public function testSortByKey1()
    {
      $this->assertNotEmpty(Arr::sortByKey($this->dummies3, array()));
    }

    //test empty and empty (array) sortByKey arr method
    public function testSortByKey2()
    {
      $this->assertEmpty(Arr::sortByKey(array(), array()));
    }

    //test empty and empty (string) sortByKey arr method
    public function testSortByKey3()
    {
      $this->assertEmpty(Arr::sortByKey(array(), ''));
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
      $this->assertNotEmpty(Arr::getWhere($this->dummies2, 'harry', 'potter', array(1,2,3,4,5)));
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
