<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-events:config')]
class ComponentEventsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:config';

    protected $description = 'Create component-events config';

    protected $path = 'app/_config';

    protected $type = 'component-events yml config';

    protected $stub = 'eventconfig.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
