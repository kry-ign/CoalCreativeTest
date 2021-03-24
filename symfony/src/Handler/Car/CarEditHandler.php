<?php

declare(strict_types=1);

namespace App\Handler\Car;

use App\Command\Car\CarEditCommand;
use Doctrine\ORM\EntityManagerInterface;

class CarEditHandler
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(CarEditCommand $command): void
    {
        $car = $command->getCar();
        $car->setName($command->getName());
        $car->setModel($command->getModel());
        $car->setYear($command->getYear());

        $this->entityManager->persist($car);
        $this->entityManager->flush();
    }

}