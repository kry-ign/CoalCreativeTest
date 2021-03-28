<?php

declare(strict_types=1);

namespace App\Handler;

use App\Command\Car\CarCreateCommand;
use App\Command\CarsCreateCommand;
use League\Tactician\CommandBus;

class CarsCreateHandler
{
    private CommandBus $commandBus;

    public function __construct(
        CommandBus $commandBus
    )
    {
        $this->commandBus = $commandBus;
    }

    public function handle(CarsCreateCommand $command): void
    {
        /** @var CarCreateCommand $car */
        foreach ($command->getCars() as $car) {
            $this->commandBus->handle($car);
        }
    }
}
