<?php

namespace App\Controller\Command;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MyCommandController extends AbstractController
{
    #[Route(path: "/command/example", name: "app_command_example")]
    public function __invoke(): Response
    {
        return $this->render('page/empty.html.twig');
    }
}