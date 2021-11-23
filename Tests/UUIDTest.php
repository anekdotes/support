<?php

namespace Tests;

use Anekdotes\Support\UUID;
use PHPUnit\Framework\TestCase;

final class UUIDTest extends TestCase
{
    //test v4 UUID method
    public function testv41()
    {
        $this->assertTrue(UUID::v4() != '');
    }
}
