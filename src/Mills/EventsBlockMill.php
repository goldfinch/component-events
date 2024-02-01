<?php

namespace Goldfinch\Component\Events\Mills;

use Goldfinch\Mill\Mill;

class EventsBlockMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
        ];
    }
}
