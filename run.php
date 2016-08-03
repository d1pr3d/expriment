<?php

require(__DIR__ . '/vendor/autoload.php');

use Symfony\Component\Console\Application;
use Vacancy\Cli;

$application = new Application();
$application->add(new Cli());

$application->run();