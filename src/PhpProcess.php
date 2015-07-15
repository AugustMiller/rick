<?php

namespace Rick;

use Symfony\Component\Process\PhpExecutableFinder;
use Symfony\Component\Process\ProcessBuilder;

class PhpProcess
{

    function __construct()
    {
        $this->finder = new PhpExecutableFinder();
        $this->binary = $this->finder->find();
    }

    public function run(Array $command_parts, $callback = null)
    {
        $this->command = array_merge(array($this->binary), $command_parts);

        $this->builder = new ProcessBuilder($this->command);
        $this->builder->setWorkingDirectory('.');
        $this->builder->setTimeout(null);

        $this->process = $this->builder->getProcess();
        $this->process->run($callback);

        return $this->process->getExitCode();
    }
}
