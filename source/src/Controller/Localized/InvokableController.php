<?php

namespace App\Controller\Localized;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: "/invokable", name: 'invokable_route')]
class InvokableController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('page/empty.html.twig');
    }
}