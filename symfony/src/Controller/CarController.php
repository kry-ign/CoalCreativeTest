<?php

declare(strict_types=1);

namespace App\Controller;

use App\Command\Car\CarDeleteCommand;
use App\Command\Car\CarEditCommand;
use App\Command\CarsCreateCommand;
use App\Entity\Car;
use App\Form\CarsType;
use App\Form\CarType;
use App\Service\CarService;
use Doctrine\Common\Collections\ArrayCollection;
use League\Tactician\CommandBus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/car", name="car_")
 * @package App\Controller
 */
class CarController extends AbstractController
{
    private CommandBus $commandBus;
    private CarService $carService;

    public function __construct(
        CommandBus $commandBus,
        CarService $carService
    )
    {
        $this->commandBus = $commandBus;
        $this->carService = $carService;
    }

    /**
     * @Route ("/view/{sortBy}/{sortOrder}", defaults={"sortBy"="id", "sortOrder"="asc"}, name="view")
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request, string $sortBy, string $sortOrder): Response
    {
        $command = new CarsCreateCommand();
        $command->setCars(new ArrayCollection([]));
        $form = $this->createForm(CarsType::class, $command)
            ->handleRequest($request);

        if ($form->isSubmitted()){
            $this->commandBus->handle($command);

            return $this->redirectToRoute('car_view');
        }

        return $this->render('car/car.html.twig', [
            'createForm' => $form->createView(),
            'cars' => $this->carService->getAllCars($sortBy,$sortOrder),
        ]);
    }


    /**
     * @Route ("/delete/{carId}", name="delete")
     * @ParamConverter("car", options={"id" = "carId"})
     * @param Car $car
     *
     * @return Response
     */
    public function delete(Car $car): Response
    {
        $command = new CarDeleteCommand($car);
        $this->commandBus->handle($command);

        return $this->redirectToRoute('car_view');
    }

    /**
     * @Route ("/edit/{carId}", name="edit")
     * @ParamConverter("car", options={"id" = "carId"})
     * @param Car $car
     *
     * @return Response
     */
    public function edit(Request $request, Car $car): Response
    {
        $command = new CarEditCommand($car);
        $form = $this->createForm(CarType::class, $command)
            ->handleRequest($request);

        if ($form->isSubmitted()){
            $this->commandBus->handle($command);

            return $this->redirectToRoute('car_view');
        }

        return $this->render('car/edit.html.twig', [
            'createForm' => $form->createView(),
            'cars' => $this->carService->getAllCars()
        ]);
    }
}