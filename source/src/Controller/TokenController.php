<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TokenController extends AbstractController
{
    #[Route('/share/{token}.{_format}', name: 'app_token', requirements: ['token' => '.+'])]
    public function index(string $token): Response
    {
        return $this->render('token/index.html.twig', [
            'controller_name' => 'TokenController',
            'token' => $token,
        ]);
    }
}
