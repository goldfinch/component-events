<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-events:ext:page')]
class EventsExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:page';

    protected $description = 'Create Events page extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/events-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
