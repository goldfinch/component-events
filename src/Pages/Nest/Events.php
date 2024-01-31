<?php

namespace Goldfinch\Component\Events\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Events\Models\Nest\EventItem;
use Goldfinch\Component\Events\Models\Nest\EventCategory;
use Goldfinch\Component\Events\Pages\Nest\EventsByCategory;
use Goldfinch\Component\Events\Controllers\Nest\EventsController;

class Events extends Nest
{
    use FielderTrait, Millable;

    private static $table_name = 'Events';

    private static $controller_name = EventsController::class;

    private static $allowed_children = [EventsByCategory::class];

    private static $icon_class = 'font-icon-p-event-alt';

    private static $defaults = [
        'NestedObject' => EventItem::class,
    ];

    public function fielder(Fielder $fielder): void
    {
        // ..
    }

    public function fielderSettings(Fielder $fielder): void
    {
        $fielder->disable(['NestedObject', 'NestedPseudo']);
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = EventItem::class;
        $this->NestedPseudo = 0;
    }

    public function Categories()
    {
        return EventCategory::get();
    }
}
