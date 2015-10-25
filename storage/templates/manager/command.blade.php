<?='<?php';?> namespace Wn\Commands\Manager;

use Wn\Commands\BaseCommand;
use Wn\Settings;
use Wn\Vars;


class {{$name}}Command extends BaseCommand {

    protected $signature = '{{$cmd}}
    @foreach ($args as $arg)
    {{'{'.$arg['name']}}: {{$arg['descr']}}.}
    @endforeach
@foreach ($opts as $opt)
    {{'{--'.$opt['name']}}= : {{$opt['descr']}}.}
    @endforeach';

    protected $description = '{{$descr}}';
    
    public function execute()
    {
        // Write something awesome here !
    }

}
