<?php

namespace Goldfinch\Component\Events\Mills;

use Goldfinch\Mill\Mill;

class EventsMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->catchPhrase(),
            'Content' => $this->faker->paragraph(20),
        ];
    }
}
