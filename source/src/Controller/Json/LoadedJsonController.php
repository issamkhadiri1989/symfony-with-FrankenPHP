<?php

namespace App\Controller\Json;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class LoadedJsonController extends AbstractController
{
    public function jsonAction(Request $request): Response
    {
        $locale = $request->getLocale();

        return $this->render('page/empty.html.twig');
    }
}
