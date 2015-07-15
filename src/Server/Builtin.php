<?php

namespace Rick\Server;

use Rick\PhpProcess;

class Builtin
{
    public function __construct($php = null)
    {
        $this->php = isset($php) ? $php : new \Rick\PhpProcess;
    }

    public function run($host, $port, $callback = null)
    {
        $address = $host . ':' . $port;

        return $this->php->run(array('-S', $address), $callback);;
    }

}
