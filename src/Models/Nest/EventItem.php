<?php

namespace Goldfinch\Component\Events\Models\Nest;

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataList;
use SilverStripe\Control\Director;
use Goldfinch\Mill\Traits\Millable;
use SilverStripe\Control\HTTPRequest;
use Goldfinch\Nest\Models\NestedObject;
use Goldfinch\Component\Events\Admin\EventsAdmin;
use Goldfinch\Component\Events\Pages\Nest\Events;
use Goldfinch\Component\Events\Configs\EventConfig;
use Goldfinch\Component\Events\Models\Nest\EventItem;
use Goldfinch\Component\Events\Models\Nest\EventCategory;

class EventItem extends NestedObject
{
    use Millable;

    public static $nest_up = null;
    public static $nest_up_children = [];
    public static $nest_down = Events::class;
    public static $nest_down_parents = [];

    private static $table_name = 'EventItem';
    private static $singular_name = 'event';
    private static $plural_name = 'events';

    private static $db = [
        'Summary' => 'Text',
        'Content' => 'HTMLText',
        'Date' => 'Datetime',
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
        'Date' => 'Date', // sortable
        'Categories.Count' => 'Categories',
    ];

    private static $searchable_list_fields = [
        'Title', 'Summary', 'Content',
    ];

    private static $default_sort = 'Date DESC, Created DESC';

    public function GridItemSummaryList()
    {
        $list = parent::GridItemSummaryList();

        $list['Image'] = $this->Image()->CMSThumbnail();
        $list['Date'] = $this->DateForHuman() . ' <span style="font-style: italic">(' . $this->dbObject('Date')->Ago() . ')</span>';

        return $list;
    }

    public function summaryFields()
    {
        $fields = parent::summaryFields();

        $cfg = EventConfig::current_config();

        if ($cfg->DisabledCategories) {
            unset($fields['Categories.Count']);
        }

        return $fields;
    }

    public function DateForHuman()
    {
        return $this->Date ? $this->dbObject('Date')->Format("d MMMM YYYY, HH:mm") : null;
    }

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fielder = $fields->fielder($this);

        $fielder->required(['Title']);

        $fielder->fields([
            'Root.Main' => [
                $fielder->string('Title'),
                $fielder->datetime('Date', 'Date', $this->Date ?? date('Y-m-d H:i:s')),
                $fielder->text('Summary'),
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

        return $fields;
    }

    // type : mix | inside | outside
    public function OtherItems($type = 'mix', $limit = 6)
    {
        $model = EventItem::get()->filter(['ID:not' => $this->ID])->shuffle();

        if ($type == 'mix') {
            //
        } else if ($type == 'inside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID', $categories);
            }
        } else if ($type == 'outside') {
            $categories = $this->Categories()->column('ID');

            if (count($categories)) {
                $model = $model->filterAny('Categories.ID:not', $categories);
            }
        }

        return $model->limit($limit);
    }

    public function CMSEditLink()
    {
        $admin = new EventsAdmin();
        return Director::absoluteBaseURL() .
            '/' .
            $admin->getCMSEditLinkForManagedDataObject($this);
    }

    /**
     * Extend nested listExtraFilter by adding additional filter option (category)
     */
    public static function listExtraFilter(DataList $list, HTTPRequest $request): DataList
    {
        $list = parent::listExtraFilter($list, $request);

        $filter = [];

        if ($request->getVar('category'))
        {
            $filter['Categories.URLSegment'] = $request->getVar('category');
        }

        if (count($filter)) {
            $list = $list->filter($filter);
        }

        return $list;
    }

    /**
     * Extend nested loadable by adding additional filter option (category)
     */
    public static function loadable(DataList $list, HTTPRequest $request, $data, $config): DataList
    {
        $list = parent::loadable($list, $request, $data, $config);

        if ($data && !empty($data))
        {
            $filter = [];

            if (isset($data['urlparams']['category']) && $data['urlparams']['category']) {

                $filter['Categories.URLSegment'] = $data['urlparams']['category'];
            }

            if (count($filter)) {
                $list = $list->filter($filter);
            }
        }

        return $list;
    }
}
