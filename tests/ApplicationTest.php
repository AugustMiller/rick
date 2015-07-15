<?php

namespace Rick;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->application = new Application();
    }

    public function testGetName()
    {
        $this->assertEquals('rick', $this->application->getName());
    }

    public function testGetVersion()
    {
        // TODO: Version should be a dynamic value based on composer.json
        $this->assertEquals('0.0.1-alpha', $this->application->getVersion());
    }
}
