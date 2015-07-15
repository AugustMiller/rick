<?php

namespace Rick;

class PhpProcessTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->process = new PhpProcess();
    }

    public function testShouldGetExitCode()
    {
        $this->assertEquals(0, $this->process->run(array('-v')));
    }

    public function testShouldRunCallback()
    {
        $tester = $this->getMockBuilder('Tester')
                       ->setMethods(array('callback'))
                       ->getMock();
        $tester->expects($this->once())
               ->method('callback')
               ->with($this->anything());
        $callback = function($type, $data) use ($tester) {
            $tester->callback($data);
        };

        $this->process->run(array('-v'), $callback);
    }
}
