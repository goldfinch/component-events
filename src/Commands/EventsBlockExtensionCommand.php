<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:ext:block')]
class EventsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:block';

    protected $description = 'Create EventsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/eventsblock-extension.stub';

    protected $prefix = 'Extension';
}
