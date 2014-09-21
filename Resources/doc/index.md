Getting Started With CommanderBundle
====================================

It is based on [https://github.com/laracasts/Commander](Jeffrey Way Commander).

## Installation

Installation is a quick just 4 step process:

1. Download Tabbi89CommanderBundle using composer
2. Enable the Bundle
3. Configure handlers
4. Create your commands

### Step 1: Download CommanderBundle using composer

Add CommanderBundle by running the command:

``` bash
$ php composer.phar require tabbi89/commander-bundle '1.*'
```

Composer will install the bundle to your project's `vendor/tabbi89` directory.

### Step 2: Enable the bundle

Enable the bundle in the kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Tabbi89\CommanderBundle\Tabbi89CommanderBundle(),
    );
}
```

### Step 3: Configure handlers

In order to register all handlers please register them with a specific tag:

```yml
acme_demo.handler.ne_author_handler:
    class: Acme\DemoBundle\Handler\NewAuthorHandler
    arguments: ["@tabbi89_commander.event.event_dispatcher"]
    tags:
        -  { name: tabbi89_command_handler, alias: NewAuthorHandler }
```

By default, the command bus will search for alias handlers (like in the example above)

### Step 4: Create your commands

#### Simple DTO

DTO represents request instructions:

```php
<?php

namespace Acme\DemoBundle\Command;

class NewAuthorCommand
{
    public $authorName;

    public $authorDescription;

    public function __construct($authorName, $authorDescription)
    {
        $this->authorName        = $authorName;
        $this->authorDescription = $authorDescription;
    }
}
```

### The Handler Class

Handler class for specific command:

```php
<?php

namespace Acme\DemoBundle\Handler;

use Tabbi89\CommanderBundle\Command\CommandHandlerInterface;
use Tabbi89\CommanderBundle\Event\EventDispatcher;
use Acme\DemoBundle\Model\Author;

class NewAuthorHandler implements CommandHandlerInterface
{
    protected $dispatcher;

    public function __construct(EventDispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function handle($command)
    {
        $author = Author::add($command->authorName, $command->authorDescription);
        $this->dispatcher->dispatch($author->releaseEvents());

        return $author;
    }
}
```

### Model Class

Example of using domain events:

```php
<?php

namespace Acme\DemoBundle\Model;

use Tabbi89\CommanderBundle\Event\EventGenerator;
use Acme\DemoBundle\Event\TodoEvent;

class Author
{
    use EventGenerator;

    protected $name;

    protected $description;

    public function __construct($name, $description)
    {
        $this->name        = $name;
        $this->description = $description;
    }

    public static function add($name, $description)
    {
        $author = new static($name, $description);
        $author->raise(new TodoEvent());

        return $author;
    }
}
```

### Controller

How to invoke commands:

```php
<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\DemoBundle\Command\NewAuthorCommand;

class AuthorController extends Controller
{
    /**
     * Post the new author
     *
     * @return Response
     */
    public function store(Request $request, $title, $description)
    {
        $command = $this->get('tabbi89_commander.command.default_command_bus');
        $author  = $command->execute(new NewAuthorCommand($title, $command));

        # ...
    }
```
