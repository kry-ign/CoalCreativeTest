<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Car;
use App\Entity\DriveTrain;

class CarFactory
{
    public static function create(
        string $name,
        string $model,
        \DateTime $year,
        DriveTrain $driveTrain
    ): Car {
        return new Car(
            $name,
            $model,
            $year,
            $driveTrain
        );
    }
}