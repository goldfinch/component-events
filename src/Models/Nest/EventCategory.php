<?php

namespace Goldfinch\Component\Events\Models\Nest;

use Goldfinch\Mill\Traits\Millable;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\Controller;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Events\Configs\EventConfig;
use Goldfinch\Component\Events\Pages\Nest\EventsByCategory;

class EventCategory extends NestedObject
{
    use Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = EventsByCategory::class;
    public static $nest_down_parents = [];

    private static $table_name = 'EventCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [
        'Content' => 'HTMLText',
    ];

    private static $belongs_many_many = [
        'Items' => EventItem::class,
    ];

    private static $summary_fields = [
        'Items.Count' => 'Events',
    ];

    private static $searchable_list_fields = [
        'Title', 'Content',
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields()->initFielder($this);

        $fielder = $fields->getFielder();

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
            ],
        ]);

        $this->extend('updateCMSFields', $fields);

        return $fields;
    }

    public function List()
    {
        if (Controller::has_curr()) {
            $ctrl = Controller::curr();

            $cfg = EventConfig::current_config();

            return PaginatedList::create($this->Items(), $ctrl->getRequest())->setPageLength($cfg->ItemsPerPage ?? 10);
        }
    }

    public function OtherCategories($type = 'mix', $limit = 6, $escapeEmpty = true)
    {
        $filter = ['ID:not' => $this->ID];

        if ($escapeEmpty) {
            $filter['Items.Count():GreaterThan'] = 0;
        }

        return EventCategory::get()->filter($filter)->shuffle()->limit($limit);
    }
}
