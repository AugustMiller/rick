<?php

namespace Rick;

use Symfony\Component\Console\Application as App;

class Application extends App
{
    public function getName()
    {
        return 'rick';
    }

    public function getVersion()
    {
        // TODO: Version should be a dynamic value based on composer.json
        return '0.0.1-alpha';
    }
}
