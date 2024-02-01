<?php

namespace Goldfinch\Component\Events\Controllers\Nest;

use Goldfinch\Nest\Controllers\NestController;
use Goldfinch\Component\Events\Configs\EventConfig;

class EventsController extends NestController
{
    public function NestedList()
    {
        if ($this->NestedObject) {
            $cfg = $this->NestedObject::config();
            $cfgDB = EventConfig::current_config();
            if ($cfgDB->ItemsPerPage) {
                $cfg->set('nestedListPageLength', $cfgDB->ItemsPerPage);
            }
        }

        return parent::NestedList();
    }
}
