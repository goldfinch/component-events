<?php

namespace Goldfinch\Component\Events\Mills;

use Goldfinch\Mill\Mill;

class EventsMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(3),
            'Content' => $this->faker->paragraph(20),
        ];
    }
}
