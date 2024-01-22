<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-events:ext:controller')]
class EventsControllerExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:controller';

    protected $description = 'Create EventsController extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/eventscontroller-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
