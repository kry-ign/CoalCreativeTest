<?php

declare(strict_types=1);

namespace App\Command\Car;

use App\Entity\Car;

class CarEditCommand extends CarAbstractCommand
{
    private Car $car;

    public function __construct(Car $car)
    {
        $this->car =$car;
        $this->setName($car->getName());
        $this->setModel($car->getModel());
        $this->setYear($car->getYear());
    }

    public function getCar(): Car
    {
        return $this->car;
    }
}