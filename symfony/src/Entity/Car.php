<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity
 * @package App\Entity
 */
class Car
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @var int
     */
    private int $id;

    /**
     * @ORM\Column (type="string")
     * @var string
     */
    private string $name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private string $model;

    /**
     * @ORM\Column(type="datetime")
     */
    private \DateTime $year;

    /**
     * @ORM\ManyToOne(targetEntity="DriveTrain")
     * @ORM\JoinColumn(name="drive_train_id", referencedColumnName="id")
     */
    private DriveTrain $driveTrain;

    public function __construct(
        string $name,
        string $model,
        \DateTime $year,
        DriveTrain $driveTrain
    )
    {
        $this->name = $name;
        $this->model = $model;
        $this->year = $year;
        $this->driveTrain = $driveTrain;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @param string $model
     */
    public function setModel(string $model): void
    {
        $this->model = $model;
    }

    /**
     * @return \DateTime
     */
    public function getYear(): \DateTime
    {
        return $this->year;
    }

    /**
     * @param \DateTime $year
     * @return $this
     */
    public function setYear(\DateTime $year): self
    {
        $this->year = $year;

        return $this;
    }

    /**
     * @return DriveTrain
     */
    public function getDriveTrain(): DriveTrain
    {
        return $this->driveTrain;
    }

    /**
     * @param DriveTrain $driveTrain
     */
    public function setDriveTrain(DriveTrain $driveTrain): void
    {
        $this->driveTrain = $driveTrain;
    }
}
