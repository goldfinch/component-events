<?php

namespace Goldfinch\Component\Events\Configs;

use JonoM\SomeConfig\SomeConfig;
use SilverStripe\ORM\DataObject;
use SilverStripe\Forms\CompositeField;
use SilverStripe\View\TemplateGlobalProvider;

class EventConfig extends DataObject implements TemplateGlobalProvider
{
    use SomeConfig;

    private static $table_name = 'EventConfig';

    private static $db = [];

    private static $field_descriptions = [];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // $fields->removeByName(['']);

        $fields->addFieldsToTab('Root.Main', [

            CompositeField::create(

                // ..

            ),

        ]);

        return $fields;
    }
}
