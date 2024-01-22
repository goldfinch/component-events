<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-events:config')]
class EventsConfigCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:config';

    protected $description = 'Create Events YML config';

    protected $path = 'app/_config';

    protected $type = 'config';

    protected $stub = './stubs/config.stub';

    protected $extension = '.yml';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
