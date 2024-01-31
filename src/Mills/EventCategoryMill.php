<?php

namespace Goldfinch\Component\Events\Mills;

use Goldfinch\Mill\Mill;

class EventCategoryMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(5),
        ];
    }
}
