<?php

declare(strict_types=1);

namespace App\Handler\Car;

use App\Command\Car\CarDeleteCommand;
use Doctrine\ORM\EntityManagerInterface;

class CarDeleteHandler
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function handle(CarDeleteCommand $command): void
    {
        $this->entityManager->remove($command->getCar());
        $this->entityManager->flush();
    }
}