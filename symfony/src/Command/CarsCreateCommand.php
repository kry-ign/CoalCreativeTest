<?php

declare(strict_types=1);

namespace App\Command;

use Doctrine\Common\Collections\ArrayCollection;

class CarsCreateCommand
{
    private ArrayCollection $cars;

    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }

    public function getCars(): ArrayCollection
    {
        return $this->cars;
    }

    public function setCars(ArrayCollection $cars): void
    {
        $this->cars = $cars;
    }
}