<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-events-eventconfig')]
class EventConfigExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events-eventconfig';

    protected $description = 'Create EventConfig extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-events config extension';

    protected $stub = 'eventconfig-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
