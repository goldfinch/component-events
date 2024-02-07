<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:ext:config')]
class EventConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:config';

    protected $description = 'Create EventConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/eventconfig-extension.stub';

    protected $suffix = 'Extension';
}
