<?php

declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\Entity;

/**
 * @Entity
 * Class Equipment
 * @package App\Entity
 */
class Equipment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column (type="integer")
     * @var int
     */
    private int $id;

    /**
     * @ORM\Column (type="boolean")
     * @var bool
     */
    private bool $parkAssist;

    /**
     * @ORM\Column (type="boolean")
     * @var bool
     */
    private bool $automaticTransmission;

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
     * @return bool
     */
    public function isParkAssist(): bool
    {
        return $this->parkAssist;
    }

    /**
     * @param bool $parkAssist
     */
    public function setParkAssist(bool $parkAssist): void
    {
        $this->parkAssist = $parkAssist;
    }

    /**
     * @return bool
     */
    public function isAutomaticTransmission(): bool
    {
        return $this->automaticTransmission;
    }

    /**
     * @param bool $automaticTransmission
     */
    public function setAutomaticTransmission(bool $automaticTransmission): void
    {
        $this->automaticTransmission = $automaticTransmission;
    }

}
