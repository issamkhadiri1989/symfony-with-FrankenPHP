<?php

namespace App\Controller;

use App\Elasticsearch\Finder\ArticleFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'app_search')]
    public function index(ArticleFinder $finder): Response
    {
        $document = $finder->findOneByIdentifier(1);

        dump($document->getData());

//        $finder->updateDocument(1, ['content' => 'updated']);

//        dd($document->getData());

        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }
}
