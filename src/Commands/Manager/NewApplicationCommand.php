<?php namespace Wn\Commands\Manager;

use Wn\Commands\BaseCommand;
use Wn\Settings;
use Wn\Vars;


class NewApplicationCommand extends BaseCommand {

    protected $signature = 'new-app {name : The application name}';

    protected $description = 'Creates a new application';
    
    public function execute()
    {
        $name = $this->argument('name');

        $content = $this->getTemplate('manager/application')
                        ->with('name', $name)
                        ->render();

        $path = Vars::get('root') . "bin/{$name}";

        $this->fs->put($path, $content);

        chmod($path, 0755);

        $this->info("{$name} application created");
    }
    
}
