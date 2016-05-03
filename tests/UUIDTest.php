<?php

namespace Tests;

use PHPUnit_Framework_TestCase;
use Anekdotes\Support\UUID;

class UUIDTest extends PHPUnit_Framework_TestCase
{
    //test v4 UUID method
    public function testv41()
    {
        $this->assertTrue(UUID::v4() != '');
    }

}
