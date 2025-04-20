<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CrewsController extends AbstractController
{
    #[Route('/crews', name: 'app_crews')]
    public function index(): Response
    {
        return $this->render('crews/index.html.twig', [
            'controller_name' => 'CrewsController',
        ]);
    }
}
