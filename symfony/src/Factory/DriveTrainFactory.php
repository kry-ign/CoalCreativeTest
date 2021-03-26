<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\DriveTrain;

class DriveTrainFactory
{
    public static function create(
        string $name
    ): DriveTrain {
        return new DriveTrain(
            $name,
        );
    }
}