<?php

namespace Goldfinch\Component\Events\Configs;

use Goldfinch\Harvest\Harvest;
use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use Goldfinch\Harvest\Traits\HarvestTrait;
use SilverStripe\View\TemplateGlobalProvider;

class EventConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig, HarvestTrait;

    private static $table_name = 'EventConfig';

    private static $db = [];

    public function harvest(Harvest $harvest): void
    {
        // ..
    }
}
