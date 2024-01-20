<?php

namespace Goldfinch\Component\Events\Admin;

use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use Goldfinch\Component\Events\Blocks\EventsBlock;
use Goldfinch\Component\Events\Configs\EventConfig;
use Goldfinch\Component\Events\Models\Nest\EventItem;
use Goldfinch\Component\Events\Models\Nest\EventCategory;

class EventsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'events';
    private static $menu_title = 'Events';
    private static $menu_icon_class = 'font-icon-p-event-alt';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        EventItem::class => [
            'title' => 'Events',
        ],
        EventCategory::class => [
            'title' => 'Categories',
        ],
        EventsBlock::class => [
            'title' => 'Blocks',
        ],
        EventConfig::class => [
            'title' => 'Settings',
        ],
    ];

    public function getManagedModels()
    {
        $models = parent::getManagedModels();

        $cfg = EventConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($models[EventCategory::class]);
        }

        if (!class_exists('DNADesign\Elemental\Models\BaseElement')) {
            unset($models[EventsBlock::class]);
        }

        if (empty($cfg->config('db')->db)) {
            unset($models[EventConfig::class]);
        }

        return $models;
    }
}
