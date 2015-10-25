<?php namespace Wn\Commands\Manager;

use Wn\Commands\BaseCommand;
use Wn\Settings;
use Wn\Vars;


class NewCommandCommand extends BaseCommand {

    protected $signature = 'new-cmd 
        {name : The command name. }
        {--descr= : The description of the command. }
        {--args= : The arguents of the command. }
        {--opts= : The options of the command. }
        {--path= : Where to store the command class file. }
        ';

    protected $description = 'Creates a new command';
    
    public function execute()
    {
        $name = ucwords(camel_case($this->argument('name')));
        $cmd = snake_case($name, '-');
        $path = $this->getPath($name);

        $data = [
            'name' => $name,
            'cmd' => $cmd,
            'descr' => $this->getCommandDescription(),
            'args' => $this->parseArray('args'),
            'opts' => $this->parseArray('opts')
        ];

        $content = $this->getTemplate('manager/command')
                        ->with($data)
                        ->render();

        $this->fs->put($path, $content);

        $this->info("{$name} command created");
    }

    protected function getPath($name)
    {
        $path = $this->option('path');
        if(! $path){
            $path = 'src/Commands';
        }

        return Vars::get('root') . "/{$path}/{$name}Command.php";
    }

    protected function getCommandDescription()
    {
        $descr = $this->option('descr');
        if(! $descr){
            $descr = 'Some description here';
        }
        return $descr;
    }

    protected function parseArray($type)
    {
        $array = $this->option($type);

        if(! $array){
            return [];
        }

        return $this->getArgumentParser('manager/command-args')
                    ->parse($array);
    }

}
