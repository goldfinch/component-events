<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:ext:controller')]
class EventsControllerExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:controller';

    protected $description = 'Create EventsController extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/eventscontroller-extension.stub';

    protected $suffix = 'Extension';
}
