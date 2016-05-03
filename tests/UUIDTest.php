<?php

namespace Tests;

use Anekdotes\Support\UUID;
use PHPUnit_Framework_TestCase;

class UUIDTest extends PHPUnit_Framework_TestCase
{
    //test v4 UUID method
    public function testv41()
    {
        $this->assertTrue(UUID::v4() != '');
    }
}
