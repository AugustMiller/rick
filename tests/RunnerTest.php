<?php

namespace Rick;

class RunnerTest extends \PHPUnit_Framework_TestCase
{
    public function testInitialization()
    {
        $this->assertInstanceOf('Rick\Runner', new Runner('foo'));
    }
}
