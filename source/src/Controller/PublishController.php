<?php

namespace App\Controller;

use App\Server\Mercure\Publisher\PublisherInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PublishController extends AbstractController
{
    #[Route('/publish', name: 'app_publish')]
    public function index(PublisherInterface $publisher): Response
    {
        $publisher->publish('http://localhost/books/1', \json_encode(['status' => 'OutOfStock']));

        return $this->render('publish/index.html.twig', [
            'controller_name' => 'PublishController',
        ]);
    }
}
