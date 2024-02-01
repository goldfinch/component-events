<?php

namespace Goldfinch\Component\Events\Models\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Mill\Traits\Millable;
use SilverStripe\ORM\PaginatedList;
use SilverStripe\Control\Controller;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Events\Pages\Nest\EventsByCategory;

class EventCategory extends NestedObject
{
    use FielderTrait, Millable;

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

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
            ],
        ]);
    }

    public function List()
    {
        if (Controller::has_curr()) {
            $ctrl = Controller::curr();

            return PaginatedList::create($this->Items(), $ctrl->getRequest()); // ->setPageLength(10);
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
