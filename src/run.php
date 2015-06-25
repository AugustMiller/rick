<?php

require __DIR__ . '/../vendor/autoload.php';

use Rick\Runner;
use Rick\Application;

$application = new Application();

$runner = new Runner($application);
$runner->run();
