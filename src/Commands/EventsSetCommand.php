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
        $command = $this->getApplication()->find('vendor:component-events:ext:admin');
        $command->run(new ArrayInput(['name' => 'EventsAdmin']), $output);

        $command = $this->getApplication()->find('vendor:component-events:ext:config');
        $command->run(new ArrayInput(['name' => 'EventConfig']), $output);

        $command = $this->getApplication()->find('vendor:component-events:ext:block');
        $command->run(new ArrayInput(['name' => 'EventsBlock']), $output);

        $command = $this->getApplication()->find('vendor:component-events:ext:page');
        $command->run(new ArrayInput(['name' => 'Events']), $output);

        $command = $this->getApplication()->find('vendor:component-events:ext:controller');
        $command->run(new ArrayInput(['name' => 'EventsController']), $output);

        $command = $this->getApplication()->find('vendor:component-events:ext:item');
        $command->run(new ArrayInput(['name' => 'EventItem']), $output);

        $command = $this->getApplication()->find('vendor:component-events:ext:category');
        $command->run(new ArrayInput(['name' => 'EventCategory']), $output);

        $command = $this->getApplication()->find('vendor:component-events:config');
        $command->run(new ArrayInput(['name' => 'component-events']), $output);

        $command = $this->getApplication()->find('vendor:component-events:templates');
        $command->run(new ArrayInput([]), $output);

        return Command::SUCCESS;
    }
}
