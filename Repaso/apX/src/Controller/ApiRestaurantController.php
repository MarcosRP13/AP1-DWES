<?php

namespace App\Controller;

use App\Entity\Camareros;
use App\Entity\Platos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/restaurant', name: 'app_api_restaurant')]
final class ApiRestaurantController extends AbstractController
{
    #[Route('', name: 'list', methods: ['GET'])]
    public function list(EntityManagerInterface $em): JsonResponse
    {

        $camareros = $em->getRepository(Camareros::class)->findAll();
        $data = [];
        foreach ($camareros as $camarero) {
            $platos =
                $em->getRepository(Platos::class)->findBy(['waiter_id' => $camarero->getId()], ['name' => 'ASC']);
            $d = [];
            foreach ($platos as $plato) {
                $d[] = [
                    'id' => $plato->getid(),
                    'name' => $plato->getName(),
                    'description' => $plato->getDescription(),
                    'price' => $plato->getPrice(),
                    'category' => $plato->getCategory(),
                    'allergens' => $plato->getAllergens(),
                    'time_prep' => $plato->getTimePrep(),
                    'stock_dis' => $plato->getStockDis(),
                ];
            }
            $data[] = [
                'id' => $camarero->getId(),
                'name' => $camarero->getName(),
                'lastName' => $camarero->getLastName(),
                'platos' => $d
            ];
        }
        return new JsonResponse($data);
    }
}






