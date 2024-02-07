<?php

namespace Goldfinch\Component\Events\Commands;

use Goldfinch\Taz\Console\GeneratorCommand;

#[AsCommand(name: 'vendor:component-events:ext:category')]
class EventCategoryExtensionCommand extends GeneratorCommand
{
    protected static $defaultName = 'vendor:component-events:ext:category';

    protected $description = 'Create EventCategory extension';

    protected $path = '[psr4]/Extensions';

    protected $type = 'extension';

    protected $stub = './stubs/eventcategory-extension.stub';

    protected $suffix = 'Extension';
}
