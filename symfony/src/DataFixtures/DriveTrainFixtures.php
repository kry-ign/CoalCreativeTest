<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\DriveTrain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DriveTrainFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        foreach ($this->getData() as $item) {
            $driveTrain = new DriveTrain();
            $driveTrain->setName($item['driveTrain']);


            $manager->persist($driveTrain);
        }
        $manager->flush();
    }

    public function getData(): array
    {
        return [
            [
                'driveTrain' => 'FWD',
            ],
            [
                'driveTrain' => 'RWD',
            ],
            [
                'driveTrain' => '4X4',
            ]
        ];
    }
}
