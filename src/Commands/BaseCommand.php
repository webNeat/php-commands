<?php namespace Wn\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Wn\Argument\ArgumentFormatLoader;
use Wn\Argument\ArgumentParser;
use Wn\Settings;
use Wn\Vars;


class BaseCommand extends Command {
    
    protected $fs;
    protected $setts;
    protected $templates;

    public function __construct()
    {
        parent::__construct();
        
        $this->fs = Vars::get('fs');
        $this->setts = Vars::get('setts');
        $this->templates = Vars::get('templates')->view();
        $this->argumentFormatLoader = new ArgumentFormatLoader($this->fs, $this->setts->path('formatsPath'));
    }

    protected function getTemplate($name)
    {
        return $this->templates->make($name);
    }

    protected function getArgumentParser($name){
        $format = $this->argumentFormatLoader->load($name);
        return new ArgumentParser($format);
    }

    protected function save($content, $path)
    {
        $this->makeDirectory($path);
        $this->fs->put($path, $content);
    }

    protected function makeDirectory($path)
    {
        if (!$this->fs->isDirectory(dirname($path))) {
            $this->fs->makeDirectory(dirname($path), 0777, true, true);
        }
    }

}
