<?php

declare(strict_types=1);

namespace App\Handler\Car;

use App\Command\Car\CarCreateCommand;
use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;

class CarCreateHandler
{
    private EntityManagerInterface $objectManager;

    public function __construct(EntityManagerInterface $objectManager)
    {
        $this->objectManager = $objectManager;
    }

    public function handle(CarCreateCommand $command): void
    {
        $car = new Car();
        $car->setName($command->getName());
        $car->setModel($command->getModel());
        $car->setYear($command->getYear());
        $car->setDriveTrain($command->getDriveTrain());


        $this->objectManager->persist($car);
        $this->objectManager->flush();
    }
}
