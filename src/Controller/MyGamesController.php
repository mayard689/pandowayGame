<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

  /**
  * @IsGranted("ROLE_USER")
  */
class MyGamesController extends AbstractController
{
    /**
     * @Route("/mygames", name="my_games")
     */
    public function index(): Response
    {
        return $this->render('my_games/index.html.twig', [
            'controller_name' => 'MyGamesController',
        ]);
    }
}