<?php namespace MyCommands;

use Wn\Commands\BaseCommand;


class MakeFilesCommand extends BaseCommand {

    protected $signature = 'make-files
        {file : The text file containing the structure definition.}
    ';

    protected $description = 'Makes a files structure based on a text file';
    
    public function execute()
    {
        // Write something awesome here !
    }

}
