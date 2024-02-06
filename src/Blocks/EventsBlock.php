<?php

namespace Goldfinch\Component\Events\Blocks;

use Goldfinch\Blocks\Models\BlockElement;
use Goldfinch\Component\Events\Models\Nest\EventItem;
use Goldfinch\Component\Events\Models\Nest\EventCategory;

class EventsBlock extends BlockElement
{
    private static $table_name = 'EventsBlock';
    private static $singular_name = 'Events';
    private static $plural_name = 'Events';

    private static $db = [];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-p-event-alt';

    public function Items()
    {
        return EventItem::get();
    }

    public function Categories()
    {
        return EventCategory::get();
    }
}
