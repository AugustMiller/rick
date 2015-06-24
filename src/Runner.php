<?php

namespace Rick;

class Runner
{
    public $directory;

    public function __construct($directory = null)
    {
        $this->directory = $directory;
    }
}
