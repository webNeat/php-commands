<?php
require __DIR__ . '/vendor/autoload.php';

use Illuminate\Filesystem\Filesystem;
use Philo\Blade\Blade;
use Wn\Settings;
use Wn\Vars;

Vars::set('root', __DIR__ . '/');

Vars::set('fs', new Filesystem);

Vars::set('setts', new Settings(
    Vars::get('fs'),
    __DIR__ . '/settings.json')
);

Vars::set('templates', $blade = new Blade(
    Vars::get('setts')->path('templatesPath'),    
    Vars::get('setts')->path('cachePath')
));
