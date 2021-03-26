<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Car;
use App\Entity\DriveTrain;
use Faker\Factory;
use Monolog\Test\TestCase;

class CarTest extends TestCase
{
    /**
     * @test
     * @dataProvider valuesProvider
     * @param string $name
     * @param string $model
     * @param \DateTime $year
     * @param DriveTrain $driveTrain
     */
    public function it_can_created(
        string $name,
        string $model,
        \DateTime $year,
        DriveTrain $driveTrain

    ): void
    {
        $car = new Car(
            $name,
            $model,
            $year,
            $driveTrain
        );

        $this->assertEquals($name, $car->getName());
        $this->assertEquals($model, $car->getModel());
        $this->assertEquals($year, $car->getYear());
        $this->assertEquals($driveTrain, $car->getDriveTrain());
    }

    public function valuesProvider(): array
    {
        $faker = Factory::create();

        return [
            [
                '',
                '',
                $faker->dateTime(),
                $this->createMock(DriveTrain::class),
            ],
        ];
    }
}