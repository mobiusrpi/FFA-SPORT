<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class SessionsController extends AbstractController
{
    #[Route('/sessions', name: 'app_sessions')]
    public function index(Request $resquest): Response
    {
        $session = $resquest->getSession();
        dd($session);
        return $this->render('sessions/index.html.twig', [
            'controller_name' => 'SessionsController',
        ]);
    }
}
