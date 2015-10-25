#!/usr/bin/env php
<?='<?php';?>


use Symfony\Component\Console\Application;

require __DIR__ . '/../bootstrap.php';

$app = new Application('{{$name}}', '1.0');

// $app->add(new FooCommand);

$app->run();
