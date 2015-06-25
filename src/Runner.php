<?php

namespace Rick;

use Rick\Server\Builtin;
use Rick\Command\ServerCommand;

class Runner
{
    public $application;

    public function __construct($application)
    {
        $server = new \Rick\Server\Builtin();

        $this->application = $application;
        $this->application->add(new ServerCommand($server));
    }

    public function run()
    {
        return $this->application->run();
    }
}
