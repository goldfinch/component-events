<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:config')]
class EventsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:config';

    protected $description = 'Create Events YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';
}
