<?php

namespace Goldfinch\Component\Events\Pages\Nest;

use Goldfinch\Fielder\Fielder;
use Goldfinch\Nest\Pages\Nest;
use Goldfinch\Mill\Traits\Millable;
use Goldfinch\Fielder\Traits\FielderTrait;
use Goldfinch\Component\Events\Models\Nest\EventCategory;
use Goldfinch\Component\Events\Controllers\Nest\EventsByCategoryController;

class EventsByCategory extends Nest
{
    use FielderTrait, Millable;

    private static $table_name = 'EventsByCategory';

    private static $controller_name = EventsByCategoryController::class;

    private static $allowed_children = [];

    private static $icon_class = 'font-icon-p-event-alt';

    private static $can_be_root = false;

    private static $description = 'Nested pseudo page, to display individual categories. Can only be added within Events page as a child page';

    public function fielder(Fielder $fielder): void
    {
        $fielder->remove([
            'Content',
            'MenuTitle',
        ]);

        $fielder->description('Title', 'Does not show up anywhere except SiteTree in the CMS');
    }

    public function fielderSettings(Fielder $fielder): void
    {
        if ($this->NestedPseudo) {
            $fielder->removeFieldsInTab('Root.Search');
            $fielder->removeFieldsInTab('Root.General');
            $fielder->removeFieldsInTab('Root.SEO');
        }

        $fielder->disable(['NestedObject']); // NestedPseudo
    }

    protected function onBeforeWrite()
    {
        parent::onBeforeWrite();

        $this->NestedObject = EventCategory::class;
        // $this->NestedPseudo = 1;
        $this->ShowInMenus = 0;
        $this->ShowInSearch = 0;
    }
}
