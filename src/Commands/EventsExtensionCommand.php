<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:ext:page')]
class EventsExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:page';

    protected $description = 'Create Events page extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/events-extension.stub';

    protected $prefix = 'Extension';
}
