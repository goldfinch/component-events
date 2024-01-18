<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-events:eventcategory')]
class EventCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:eventcategory';

    protected $description = 'Create EventCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-events category extension';

    protected $stub = 'eventcategory-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
