<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:templates')]
class EventsTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:templates';

    protected $description = 'Publish [goldfinch/component-events] templates';

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-events');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPath = BASE_PATH . '/vendor/goldfinch/component-events/templates/Goldfinch/Component/Events/';
            $themePath = 'themes/' . $theme . '/templates/Goldfinch/Component/Events/';

            $files = [
                [
                    'from' => $componentPath . 'Blocks/EventsBlock.ss',
                    'to' => $themePath . 'Blocks/EventsBlock.ss',
                ],
                [
                    'from' => $componentPath . 'Models/Nest/EventItem.ss',
                    'to' => $themePath . 'Models/Nest/EventItem.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Events.ss',
                    'to' => $themePath . 'Pages/Nest/Events.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
