<?php

declare(strict_types=1);

namespace App\Command\Car;

use App\Entity\Car;

class CarDeleteCommand extends CarAbstractCommand
{
    private Car $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function getCar(): car
    {
        return $this->car;
    }
}
