<?php

namespace Goldfinch\Component\Events\Pages\Nest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use Goldfinch\Component\Events\Controllers\Nest\EventsController;

class Events extends Nest
{
    use HarvestTrait;

    private static $table_name = 'Events';

    private static $controller_name = EventsController::class;

    private static $icon_class = 'font-icon-p-event-alt';

    public function harvest(Harvest $harvest): void
    {
        // ..
    }

    public function harvestSettings(Harvest $harvest): void
    {
        // ..
    }
}
