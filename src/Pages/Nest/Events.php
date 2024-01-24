<?php

namespace Goldfinch\Component\Events\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Events\Controllers\Nest\EventsController;

class Events extends Nest
{
    use FielderTrait;

    private static $table_name = 'Events';

    private static $controller_name = EventsController::class;

    private static $icon_class = 'font-icon-p-event-alt';

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        // ..
    }
}
