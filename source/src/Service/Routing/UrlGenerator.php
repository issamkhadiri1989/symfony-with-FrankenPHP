<?php

namespace App\Service\Routing;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class UrlGenerator
{
    public function __construct(private UrlGeneratorInterface $router)
    {
    }

    public function generate(): string
    {
        return $this->router->generate('app_doc', ['_locale' => 'en_UK'], UrlGeneratorInterface::ABSOLUTE_URL);
    }
}