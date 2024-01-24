<?php

namespace Goldfinch\Component\Events\Models\Nest;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Forms\TextField;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;

class EventCategory extends NestedObject
{
    use FielderTrait;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = null;
    public static $nest_down_parents = [];

    private static $table_name = 'EventCategory';
    private static $singular_name = 'category';
    private static $plural_name = 'categories';

    private static $db = [];

    private static $belongs_many_many = [
        'Items' => EventItem::class,
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [$fielder->string('Title')],
        ]);
    }
}
