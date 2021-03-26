<?php

declare(strict_types=1);

namespace App\Handler\Car;

use App\Command\Car\CarCreateCommand;
use App\Factory\CarFactory;
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

        $product = CarFactory::create(
            $command->getName(),
            $command->getModel(),
            $command->getYear(),
            $command->getDriveTrain());


        $this->objectManager->persist($product);
        $this->objectManager->flush();
    }
}
