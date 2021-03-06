<?php

namespace App\Controller;

use App\Entity\Clue;
use App\Form\ClueType;
use App\Repository\ClueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/clue")
 */
class ClueController extends AbstractController
{
    /**
     * @Route("/", name="clue_index", methods={"GET"})
     */
    public function index(ClueRepository $clueRepository): Response
    {
        return $this->render('clue/index.html.twig', [
            'clues' => $clueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="clue_show", methods={"GET"})
     */
    public function show(Clue $clue): Response
    {
        return $this->render('clue/show.html.twig', [
            'clue' => $clue,
        ]);
    }

    /**
     * @Route("/{id}", name="clue_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Clue $clue): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clue->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('clue_index');
    }
}
