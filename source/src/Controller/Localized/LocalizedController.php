<?php

namespace App\Controller\Localized;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class LocalizedController extends AbstractController
{
    #[Route(path: '/wave', name: 'app_wave')]
    public function index(Request $request): Response
    {
        $locale = $request->getLocale();
        dump($locale);

        return $this->render('page/empty.html.twig');
    }

    #[Route(path: "/example", name: 'app_example')]
    public function example(): Response
    {
        $generatedUrl = $this->generateUrl('app_wave', ['_locale' => 'ar_EM']);

        return $this->render('page/empty.html.twig');
    }
}