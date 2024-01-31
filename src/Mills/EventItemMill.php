<?php

namespace Goldfinch\Component\Events\Mills;

use Goldfinch\Mill\Mill;

class EventItemMill extends Mill
{
    public function factory(): array
    {
        return [
            'Title' => $this->faker->sentence(5),
            'Content' => $this->faker->paragraph(10),
        ];
    }
}
