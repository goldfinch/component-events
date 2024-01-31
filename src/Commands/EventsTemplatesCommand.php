<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Services\Templater;
use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:templates')]
class EventsTemplatesCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:templates';

    protected $description = 'Publish [goldfinch/component-events] templates';

    protected $no_arguments = true;

    protected function execute($input, $output): int
    {
        $templater = Templater::create($input, $output, $this, 'goldfinch/component-events');

        $theme = $templater->defineTheme();

        if (is_string($theme)) {

            $componentPathTemplates = BASE_PATH . '/vendor/goldfinch/component-events/templates/';
            $componentPath = $componentPathTemplates . 'Goldfinch/Component/Events/';
            $themeTemplates = 'themes/' . $theme . '/templates/';
            $themePath = $themeTemplates . 'Goldfinch/Component/Events/';

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
                    'from' => $componentPath . 'Models/Nest/EventCategory.ss',
                    'to' => $themePath . 'Models/Nest/EventCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/Events.ss',
                    'to' => $themePath . 'Pages/Nest/Events.ss',
                ],
                [
                    'from' => $componentPath . 'Pages/Nest/EventsByCategory.ss',
                    'to' => $themePath . 'Pages/Nest/EventsByCategory.ss',
                ],
                [
                    'from' => $componentPath . 'Partials/EventFilter.ss',
                    'to' => $themePath . 'Partials/EventFilter.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Events/Models/Nest/EventCategory.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Events/Models/Nest/EventCategory.ss',
                ],
                [
                    'from' => $componentPathTemplates . 'Loadable/Goldfinch/Component/Events/Models/Nest/EventItem.ss',
                    'to' => $themeTemplates . 'Loadable/Goldfinch/Component/Events/Models/Nest/EventItem.ss',
                ],
            ];

            return $templater->copyFiles($files);
        } else {
            return $theme;
        }
    }
}
