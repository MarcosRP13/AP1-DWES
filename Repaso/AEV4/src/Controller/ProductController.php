<?php

namespace App\Controller;

use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/products', name: 'api_products_')]
class ProductController extends AbstractController
{
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $categorys = $em->getRepository(Category::class)->findAll();
        $data = [];
        foreach ($categorys as $category) {
            $products = $em->getRepository(Product::class)->findBy(['category' =>  $category->getId()],  ['price' => 'ASC']);
            $d = [];
            foreach ($products as $product) {
                $d[] = [
                    'name' => $product->getName(),
                    'price' => $product->getPrice(),
                    'stock' => $product->getStock()
                    ];

            }
            $data[] = [
                'id' => $category->getId(),
                'name' => $category->getName(),
                'description' => $category->getDescription(),
                'products' => $d,

            ];
        }


        return new JsonResponse($data);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(?Product $product): JsonResponse
    {
        if (!$product) {
            return new JsonResponse(['status' => '404 not found'], 404);
        }
        $data = [
            'id' => $product->getId(),
            'name' => $product->getName(),
            'price' => $product->getPrice(),
            'stock' => $product->getStock(),
            'category' => $product->getCategory()->getName(),
        ];

        return new JsonResponse($data);
    }

    #[Route('', methods: ['POST'], name: 'create')]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {


        $data = json_decode($request->getContent(), true);
        $category = $em->getRepository(Category::class) ->find($data['category']);
        if (!$category) {
            return new JsonResponse(['status' => '404 bad request'], 404);
        }

        $product = new Product();
        $product->setName($data['name']);
        $product->setPrice($data['price']);
        $product->setStock($data['stock']);
        $product->setCategory($category);
        $category->addProduct($product);

        $em->persist($product);
        $em->flush();

        return new JsonResponse(['status' => '201 created'], 201);
    }
}
