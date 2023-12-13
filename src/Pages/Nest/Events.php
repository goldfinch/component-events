<?php

namespace Goldfinch\Component\Events\Pages\Nest;

use Goldfinch\Component\Events\Controllers\Nest\EventsController;
use Goldfinch\Nest\Pages\Nest;

class Events extends Nest
{
    private static $table_name = 'Events';
    private static $controller_name = EventsController::class;

    private static $icon_class = 'font-icon-p-event-alt';
}
