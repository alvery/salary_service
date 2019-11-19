#!/usr/bin/env php
<?php
use App\Command\ProcessSalaryCommand;
use Symfony\Component\Console\Application;
set_time_limit(0);
require __DIR__.'/../vendor/autoload.php';
$application = new Application();
$application->add(new ProcessSalaryCommand());
$application->run();