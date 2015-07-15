<?php

namespace Rick\Server;

class BuiltinTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->php = $this->getMockBuilder('Rick\PhpProcess')
                          ->getMock();
        $this->server = new Builtin($this->php);
    }

    public function testShouldRunProcess()
    {
        $this->php->expects($this->once())
                  ->method('run')
                  ->with(array('-S', 'localhost:8000'));
        $this->server->run('localhost', '8000');
    }
}
