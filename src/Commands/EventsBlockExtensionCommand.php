<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-events:eventsblock')]
class EventsBlockExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:eventsblock';

    protected $description = 'Create EventsBlock extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-events block extension';

    protected $stub = 'eventsblock-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
