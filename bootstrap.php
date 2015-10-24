<?php
require __DIR__ . '/vendor/autoload.php';

use Illuminate\Filesystem\Filesystem;
use Philo\Blade\Blade;
use Wn\Settings;

// Declaring filesystem
$fs = new Filesystem;

// Loading settings
$settings = new Settings($fs, __DIR__ . '/settings.json');

// Declaring Template Engine
$blade = new Blade(
    __DIR__ . $settings->get('templatesPath'),    
    __DIR__ . $settings->get('cachePath')    
);
