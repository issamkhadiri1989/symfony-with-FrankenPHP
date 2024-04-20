<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DocController extends AbstractController
{
//    #[Route('/doc/', name: 'app_doc', host: '{subdomain}.localhost', defaults: ['subdomain' => 'example'], requirements: ['subdomain' => '%app.authorized_hosts%'])]
    #[Route('/doc/', name: 'app_doc', host: '{subdomain<%app.authorized_hosts%>?home}.localhost')]
    public function index(Request $request): Response
    {
//        $server = $request->server->all();
//        $headers = $request->headers->all();
//        dump($headers, $server);

        $locale = $request->getLocale();
        dump($locale);

        return $this->render('doc/index.html.twig', [
            'controller_name' => 'DocController',
        ]);
    }

    #[Route(path: ['en' => '/what-s-up', 'fr' => '/comment-vas-tu'], name: 'app_custom_doc')]
    public function customDoc(Request $request): Response
    {
        dump($request);

        return $this->render('about/page.html.twig', [
            'controller_name' => 'DocController',
        ]);
    }

    #[Route(name: 'internationalized', path: ['en' => '/internationalize', 'fr' => '/international'])]
    public function internationalized(Request $request): Response
    {
        return $this->render('about/page.html.twig', [
            'controller_name' => 'DocController',
        ]);
    }
}
