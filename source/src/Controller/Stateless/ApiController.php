<?php

namespace App\Controller\Stateless;

use App\Service\Routing\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ApiController extends AbstractController
{
    #[Route(path: "/stateless", name: "stateless_route", stateless: true)]
    public function __invoke(Request $request, Session $session): Response
    {
        $attributes = $request->attributes->all();
//        $session = $request->getSession();
//
//        $session->set('key', 'value');

        $session->useUnexpectedSession();

        return $this->render('page/empty.html.twig');
    }
}
