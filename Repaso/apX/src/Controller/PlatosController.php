<?php

namespace App\Controller;

use App\Entity\Platos;
use App\Form\PlatosType;
use App\Repository\PlatosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/platos')]
final class PlatosController extends AbstractController
{
    #[Route(name: 'app_platos_index', methods: ['GET'])]
    public function index(PlatosRepository $platosRepository): Response
    {
        return $this->render('platos/index.html.twig', [
            'platos' => $platosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_platos_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $plato = new Platos();
        $form = $this->createForm(PlatosType::class, $plato, ['new'=>true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($plato);
            $entityManager->flush();

            return $this->redirectToRoute('app_platos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('platos/new.html.twig', [
            'plato' => $plato,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_platos_show', methods: ['GET'])]
    public function show(Platos $plato): Response
    {
        return $this->render('platos/show.html.twig', [
            'plato' => $plato,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_platos_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Platos $plato, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PlatosType::class, $plato, ['edit'=>true]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_platos_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('platos/edit.html.twig', [
            'plato' => $plato,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_platos_delete', methods: ['POST'])]
    public function delete(Request $request, Platos $plato, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$plato->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($plato);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_platos_index', [], Response::HTTP_SEE_OTHER);
    }
}
