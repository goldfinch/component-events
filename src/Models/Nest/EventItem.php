<?php

namespace Goldfinch\Component\Events\Models\Nest;

use Goldfinch\Fielder\Fielder;
use SilverStripe\Assets\Image;
use SilverStripe\Control\Director;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Events\Admin\EventsAdmin;
use Goldfinch\Component\Events\Pages\Nest\Events;
use Goldfinch\Component\Events\Configs\EventConfig;

class EventItem extends NestedObject
{
    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Events::class;
    public static $nest_down_parents = [];

    private static $table_name = 'EventItem';
    private static $singular_name = 'event';
    private static $plural_name = 'events';

    private static $db = [
        'Content' => 'HTMLText',
    ];

    private static $many_many = [
        'Categories' => EventCategory::class,
    ];

    private static $many_many_extraFields = [
        'Categories' => [
            'SortExtra' => 'Int',
        ],
    ];

    private static $has_one = [
        'Image' => Image::class,
    ];

    private static $owns = ['Image', 'Categories'];

    private static $summary_fields = [
        'Image.CMSThumbnail' => 'Image',
    ];

    public function fielder(Fielder $fielder): void
    {
        $fielder->require(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->html('Content'),
                $fielder->tag('Categories'),
                ...$fielder->media('Image'),
            ],
        ]);

        $fielder->dataField('Image')->setFolderName('events');

        $cfg = EventConfig::current_config();

        if ($cfg->DisabledCategories) {
            $fielder->remove('Categories');
        }
    }

    public function getNextItem()
    {
        return EventItem::get()
            ->filter(['SortOrder:LessThan' => $this->SortOrder])
            ->Sort('SortOrder DESC')
            ->first();
    }

    public function getPreviousItem()
    {
        return EventItem::get()
            ->filter(['SortOrder:GreaterThan' => $this->SortOrder])
            ->first();
    }

    public function getOtherItems()
    {
        return EventItem::get()
            ->filter('ID:not', $this->ID)
            ->limit(6);
    }

    public function CMSEditLink()
    {
        $admin = new EventsAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }
}
