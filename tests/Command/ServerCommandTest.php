<?php

namespace Rick\Command;

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

class ServerCommandTest extends \PHPUnit_Framework_TestCase
{
    public function testExecuteRunsServer()
    {
        $server = $this->getMockBuilder('Application')
                       ->setMethods(array('run'))
                       ->getMock();

        $server->expects($this->exactly(1))
               ->method('run')
               ->with('localhost', '7425');

        $application = new Application();
        $application->add(new ServerCommand($server));

        $command = $application->find('server');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array('command' => $command->getName()));
    }

    public function testExecuteRunsServerWithOptions()
    {
        $server = $this->getMockBuilder('Application')
                       ->setMethods(array('run'))
                       ->getMock();

        $server->expects($this->exactly(1))
               ->method('run')
               ->with('127.0.0.1', '8000');

        $application = new Application();
        $application->add(new ServerCommand($server));

        $command = $application->find('server');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command' => $command->getName(),
            '--port' => '8000',
            '--host' => '127.0.0.1'
        ));
    }
}
