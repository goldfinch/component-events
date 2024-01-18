<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;

#[AsCommand(name: 'vendor:component-events')]
class ComponentEventsCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events';

    protected $description = 'Populate goldfinch/component-events components';

    protected function execute($input, $output): int
    {
        $command = $this->getApplication()->find(
            'vendor:component-events-eventitem',
        );
        $input = new ArrayInput(['name' => 'EventItem']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-events-eventcategory',
        );
        $input = new ArrayInput(['name' => 'EventCategory']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-events-eventconfig',
        );
        $input = new ArrayInput(['name' => 'EventConfig']);
        $command->run($input, $output);

        $command = $this->getApplication()->find(
            'vendor:component-events-eventsblock',
        );
        $input = new ArrayInput(['name' => 'EventsBlock']);
        $command->run($input, $output);

        $command = $this->getApplication()->find('templates:component-events');
        $input = new ArrayInput([]);
        $command->run($input, $output);

        $command = $this->getApplication()->find('config:component-events');
        $input = new ArrayInput(['name' => 'component-events']);
        $command->run($input, $output);

        return Command::SUCCESS;
    }
}
