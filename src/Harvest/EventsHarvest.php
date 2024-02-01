<?php

namespace Goldfinch\Component\Events\Harvest;

use Goldfinch\Harvest\Harvest;
use Goldfinch\Blocks\Pages\Blocks;
use Goldfinch\Component\Events\Pages\Nest\Events;
use Goldfinch\Component\Events\Blocks\EventsBlock;
use Goldfinch\Component\Events\Models\Nest\EventItem;
use Goldfinch\Component\Events\Models\Nest\EventCategory;
use Goldfinch\Component\Events\Pages\Nest\EventsByCategory;

class EventsHarvest extends Harvest
{
    public static function run(): void
    {
        $eventsPage = Events::mill(1)->make([
            'Title' => 'Events',
            'Content' => '',
        ])->first();

        EventsByCategory::mill(1)->make([
            'Title' => 'Events by category',
            'Content' => '',
            'ParentID' => $eventsPage->ID,
        ]);

        EventCategory::mill(5)->make();

        EventItem::mill(30)->make()->each(function($item) {
            $categories = EventCategory::get()->shuffle()->limit(rand(0,4));

            foreach ($categories as $category) {
                $item->Categories()->add($category);
            }
        });

        // add one block to Blocks demo page (if it's exists)
        if (class_exists(Blocks::class)) {
            $demoBlocks = Blocks::get()->filter('Title', 'Blocks')->first();

            if ($demoBlocks && $demoBlocks->exists() && $demoBlocks->ElementalArea()->exists()) {
                EventsBlock::mill(1)->make([
                    'ClassName' => $demoBlocks->ClassName,
                    'TopPageID' => $demoBlocks->ID,
                    'ParentID' => $demoBlocks->ElementalArea()->ID,
                    'Title' => 'Events',
                ]);
            }
        }
    }
}
