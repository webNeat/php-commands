<?='<?php';?> namespace Wn\Commands;

use Wn\Commands\BaseCommand;


class {{$name}}Command extends BaseCommand {

    protected $signature = '{{$cmd}}
    @foreach ($args as $arg)
    {{'{'.$arg['name']}} : {{$arg['descr']}}.}
    @endforeach
@foreach ($opts as $opt)
    {{'{--'.$opt['name']}} : {{$opt['descr']}}.}
    @endforeach';

    protected $description = '{{$descr}}';
    
    public function execute()
    {
        // Write something awesome here !
    }

}
