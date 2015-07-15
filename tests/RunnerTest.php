<?php

namespace Rick;

class RunnerTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->application = $this->getMockBuilder('Application')
                                  ->setMethods(array('add', 'run'))
                                  ->getMock();

        $this->runner = new Runner($this->application);
    }

    public function testInitialization()
    {
        $this->assertInstanceOf('Rick\Runner', $this->runner);
    }

    public function testHasApplication()
    {
        $this->assertNotNull($this->runner->application);
    }

    public function testRunsApplication()
    {
        $this->application->expects($this->exactly(1))
                          ->method('run');

        $this->runner->run();
    }
}
