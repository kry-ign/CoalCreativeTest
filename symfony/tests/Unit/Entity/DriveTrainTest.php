<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\DriveTrain;
use Monolog\Test\TestCase;

class DriveTrainTest extends TestCase
{
    /**
     * @test
     * @param string $name
     * @dataProvider valuesProvider
     */
    public function it_can_created(
        string $name
    ): void
    {
        $driveTrain = new DriveTrain(
            $name
        );

        $this->assertEquals($name, $driveTrain->getName());
    }

    public function valuesProvider(): array
    {
        return [
            [
                'test',

            ],
        ];
    }
}
