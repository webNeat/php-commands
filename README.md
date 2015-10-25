# Commands

A framework to make command line applications with PHP.

# Get started

## Setup

Let's see how it works. First you need to install the framework:

1. clone this repository

2. run `composer install`

3. run `chmod +x bin/*` to give execute permissions

4. add the `bin/` directory to your `PATH`

## Create Your First Application and Command

To create a new command line application, simply run:

```
cm new-app foo
```

Now you will see a new file `foo` under the bin directory. This means that if you type `foo` into a terminal, this file will be executed.

The application will include two commands by default: `list` and `help`. To add a new command run:

```
cm new-cmd hi --descr="A demo cmd" --args="name: The name" --opts="short: A short greeting"
```

This will create a new command class file `src/Commands/HiCommand.php`.

```php
<?php namespace Wn\Commands;

use Wn\Commands\BaseCommand;


class HiCommand extends BaseCommand {

    protected $signature = 'hi
        {name :  The name.}
        {--short :  A short greeting.}
    ';

    protected $description = 'A demo cmd';
    
    public function execute()
    {
        // Write something awesome here !
    }

}
```

Let's now create a template for our hello message: `storage/templates/hello.blade.php`

```
Hello {{$name}}, how are you doing today ?
```

Next we fill the execute method:

```php
public function execute()
{
    $name = $this->argument('name');
    
    $message = "Hi $name";
    
    if(! $this->option('short'))
        $message = $this->getTemplate('hello')
                        ->with('name', $name)
                        ->render();
    $this->info($message);
}
```

The last step is the add the command to our foo application.

```php
#!/usr/bin/env php
<?php

use Symfony\Component\Console\Application;
use Wn\Commands\HiCommand;

require __DIR__ . '/../bootstrap.php';

$app = new Application('foo', '1.0');

$app->add(new HiCommand);

$app->run();
```

And now, if you run `foo hi Amine`

You will see: `Hello Amine, how are you doing today ?`

While running `foo hi Amine --short` 

Will output `Hi Amine`

## Using Argument Formats

## Tests

## Contribution

## License
