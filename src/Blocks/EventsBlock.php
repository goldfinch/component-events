<?php

namespace Goldfinch\Component\Events\Blocks;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Harvest\Traits\HarvestTrait;
use DNADesign\Elemental\Models\BaseElement;
use Goldfinch\Component\Events\Models\Nest\EventItem;
use Goldfinch\Component\Events\Models\Nest\EventCategory;

class EventsBlock extends BaseElement
{
    use HarvestTrait;

    private static $table_name = 'EventsBlock';
    private static $singular_name = 'Events';
    private static $plural_name = 'Events';

    private static $db = [
        // 'BlockTitle' => 'Varchar',
        // 'BlockSubTitle' => 'Varchar',
        // 'BlockText' => 'HTMLText',
    ];

    private static $inline_editable = false;
    private static $description = '';
    private static $icon = 'font-icon-p-event-alt';

    public function harvest(Harvest $harvest)
    {
        // ..
    }

    public function Items()
    {
        return EventItem::get();
    }

    public function Categories()
    {
        return EventCategory::get();
    }

    public function getSummary()
    {
        return $this->getDescription();
    }

    public function getType()
    {
        $default = $this->i18n_singular_name() ?: 'Block';

        return _t(__CLASS__ . '.BlockType', $default);
    }
}
