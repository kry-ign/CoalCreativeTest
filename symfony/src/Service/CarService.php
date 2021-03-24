<?php

declare(strict_types=1);

namespace App\Service;

use App\Repository\CarRepository;

class CarService
{
    private CarRepository $carRepository;

    public function __construct(
        CarRepository $carRepository
    ) {
        $this->carRepository = $carRepository;
    }

    public function getAllCars(string $sortBy = 'id', string $sortOrder = 'asc'): array
    {
        return $this->carRepository->findAllWithSorting($sortBy, $sortOrder);
    }

}