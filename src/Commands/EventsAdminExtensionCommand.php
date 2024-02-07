<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:ext:admin')]
class EventsAdminExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:admin';

    protected $description = 'Create EventsAdmin extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/eventsadmin-extension.stub';

    protected $prefix = 'Extension';
}
