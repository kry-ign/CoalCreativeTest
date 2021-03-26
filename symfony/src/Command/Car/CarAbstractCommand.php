<?php

declare(strict_types=1);

namespace App\Command\Car;

use App\Entity\DriveTrain;

class CarAbstractCommand implements CarInterfaceCommand
{
    private int $id;
    private string $name;
    private string $model;
    private \DateTime $year;
    private DriveTrain $driveTrain;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    public function getYear(): ?\DateTime
    {
        return $this->year;
    }

    public function setYear(\DateTime $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getDriveTrain(): ?DriveTrain
    {
        return $this->driveTrain;
    }

    public function setDriveTrain(DriveTrain $driveTrain): self
    {
        $this->driveTrain = $driveTrain;

        return $this;
    }
}
