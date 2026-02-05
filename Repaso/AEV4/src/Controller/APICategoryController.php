<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Category;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/categories', name: 'api_categories_')]
class APICategoryController extends AbstractController
{
    #[Route('/{id}/products', methods: ['GET'], name: 'show')]
    public function show(Category $category, Request $request, EntityManagerInterface $em): JsonResponse
    {
        $orderBy = $request->query->get('order', 'price');
        $direction = $request->query->get('direction', 'ASC');
        $allowedFields = ['price', 'name', 'stock'];

        if (!in_array($orderBy, $allowedFields)) {
            return new JsonResponse(['error' => '404 not found'], 404);
        }

        $products = $em->getRepository(Product::class)->findBy(['category' => $category], [$orderBy => $direction]);

        $data = [];
        foreach ($products as $product) {
            $data[] = [
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'stock' => $product->getStock(),
            ];
        }

        return new JsonResponse($data);
    }
}
