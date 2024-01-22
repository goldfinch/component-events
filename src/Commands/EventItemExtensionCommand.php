<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;

#[AsCommand(name: 'vendor:component-events:ext:item')]
class EventItemExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:item';

    protected $description = 'Create EventItem extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'component-events item extension';

    protected $stub = './stubs/eventitem-extension.stub';

    protected $prefix = 'Extension';

    protected function execute($input, $output): int
    {
        parent::execute($input, $output);

        return Command::SUCCESS;
    }
}
