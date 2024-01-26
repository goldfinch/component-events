<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-events')]
class EventsSetCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events';

    protected $description = 'Set of all [goldfinch/component-events] commands';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-events:ext:admin',
        );
        $input = new ArrayInput(['name' => 'EventsAdmin']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-events:ext:config',
        );
        $input = new ArrayInput(['name' => 'EventConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-events:ext:block',
        );
        $input = new ArrayInput(['name' => 'EventsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-events:ext:page',
        );
        $input = new ArrayInput(['name' => 'Events']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-events:ext:controller',
        );
        $input = new ArrayInput(['name' => 'EventsController']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-events:ext:item',
        );
        $input = new ArrayInput(['name' => 'EventItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-events:ext:category',
        );
        $input = new ArrayInput(['name' => 'EventCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-events:config');
        $input = new ArrayInput(['name' => 'component-events']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('vendor:component-events:templates');
        $input = new ArrayInput([]);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
