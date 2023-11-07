<?php

namespace Goldfinch\Component\Events\Admin;

use Goldfinch\Component\Events\Models\Nest\EventItem;
use Goldfinch\Component\Events\Blocks\EventsBlock;
use Goldfinch\Component\Events\Configs\EventConfig;
use Goldfinch\Component\Events\Models\Nest\EventCategory;
use SilverStripe\Admin\ModelAdmin;
use JonoM\SomeConfig\SomeConfigAdmin;
use SilverStripe\Forms\GridField\GridFieldConfig;

class EventsAdmin extends ModelAdmin
{
    use SomeConfigAdmin;

    private static $url_segment = 'events';
    private static $menu_title = 'Events';
    private static $menu_icon_class = 'bi-calendar-date';
    // private static $menu_priority = -0.5;

    private static $managed_models = [
        EventItem::class => [
            'title'=> 'Events',
        ],
        EventCategory::class => [
            'title'=> 'Categories',
        ],
        EventsBlock::class => [
            'title'=> 'Blocks',
        ],
        EventConfig::class => [
            'title'=> 'Settings',
        ],
    ];

    // public $showImportForm = true;
    // public $showSearchForm = true;
    // private static $page_length = 30;

    public function getList()
    {
        $list = parent::getList();

        // ..

        return $list;
    }

    protected function getGridFieldConfig(): GridFieldConfig
    {
        $config = parent::getGridFieldConfig();

        // ..

        return $config;
    }

    public function getSearchContext()
    {
        $context = parent::getSearchContext();

        // ..

        return $context;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form = parent::getEditForm($id, $fields);

        // ..

        return $form;
    }

    // public function getExportFields()
    // {
    //     return [
    //         // 'Name' => 'Name',
    //         // 'Category.Title' => 'Category'
    //     ];
    // }
}
