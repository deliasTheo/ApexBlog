<?php

namespace App\Controller;

use App\Entity\WorldRecordSolo;
use App\Form\WorldRecordSolo2Type;
use App\Repository\WorldRecordSoloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/worldRecord')]
class TDWorldRecordSoloController extends AbstractController
{
    #[Route('/', name: 't_d_world_record_solo_index', methods: ['GET'])]
    public function index(WorldRecordSoloRepository $worldRecordSoloRepository): Response
    {
        return $this->render('td_world_record_solo/index.html.twig', [
            'world_record_solos' => $worldRecordSoloRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 't_d_world_record_solo_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $worldRecordSolo = new WorldRecordSolo();
        $form = $this->createForm(WorldRecordSolo2Type::class, $worldRecordSolo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($worldRecordSolo);
            $entityManager->flush();

            return $this->redirectToRoute('t_d_world_record_solo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('td_world_record_solo/new.html.twig', [
            'world_record_solo' => $worldRecordSolo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 't_d_world_record_solo_show', methods: ['GET'])]
    public function show(WorldRecordSolo $worldRecordSolo): Response
    {
        return $this->render('td_world_record_solo/show.html.twig', [
            'world_record_solo' => $worldRecordSolo,
        ]);
    }

    #[Route('/{id}/edit', name: 't_d_world_record_solo_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, WorldRecordSolo $worldRecordSolo): Response
    {
        $form = $this->createForm(WorldRecordSolo2Type::class, $worldRecordSolo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('t_d_world_record_solo_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('td_world_record_solo/edit.html.twig', [
            'world_record_solo' => $worldRecordSolo,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 't_d_world_record_solo_delete', methods: ['POST'])]
    public function delete(Request $request, WorldRecordSolo $worldRecordSolo): Response
    {
        if ($this->isCsrfTokenValid('delete'.$worldRecordSolo->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($worldRecordSolo);
            $entityManager->flush();
        }

        return $this->redirectToRoute('t_d_world_record_solo_index', [], Response::HTTP_SEE_OTHER);
    }
}
