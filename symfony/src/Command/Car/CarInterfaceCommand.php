<?php

declare(strict_types=1);

namespace App\Command\Car;

use App\Entity\DriveTrain;
use Symfony\Component\Validator\Constraints\DateTime;

interface CarInterfaceCommand
{
    public function getId(): int;

    public function setId(int $id): void;

    public function getName(): string;

    public function setName(string $name): void;

    public function getModel(): string;

    public function setModel(string $model): void;

    public function getYear(): ?\DateTime;

    public function setYear(\DateTime $year): self;

    public function getDriveTrain(): ?DriveTrain;

    public function setDriveTrain(DriveTrain $driveTrain): self;

}
