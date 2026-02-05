<?php

namespace App\Controller;

use App\Entity\Camareros;
use App\Form\CamarerosType;
use App\Repository\CamarerosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/camareros')]
final class CamarerosController extends AbstractController
{
    #[Route(name: 'app_camareros_index', methods: ['GET'])]
    public function index(CamarerosRepository $camarerosRepository): Response
    {
        return $this->render('camareros/index.html.twig', [
            'camareros' => $camarerosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_camareros_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $camarero = new Camareros();
        $form = $this->createForm(CamarerosType::class, $camarero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($camarero);
            $entityManager->flush();

            return $this->redirectToRoute('app_camareros_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('camareros/new.html.twig', [
            'camarero' => $camarero,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camareros_show', methods: ['GET'])]
    public function show(Camareros $camarero): Response
    {
        return $this->render('camareros/show.html.twig', [
            'camarero' => $camarero,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_camareros_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Camareros $camarero, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CamarerosType::class, $camarero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_camareros_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('camareros/edit.html.twig', [
            'camarero' => $camarero,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_camareros_delete', methods: ['POST'])]
    public function delete(Request $request, Camareros $camarero, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$camarero->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($camarero);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_camareros_index', [], Response::HTTP_SEE_OTHER);
    }
}
