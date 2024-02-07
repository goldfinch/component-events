<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:ext:item')]
class EventItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:item';

    protected $description = 'Create EventItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/eventitem-extension.stub';

    protected $prefix = 'Extension';
}
