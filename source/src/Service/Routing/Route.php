<?php

namespace App\Service\Routing;

use Symfony\Component\HttpFoundation\RequestStack;

class Route
{
    public function __construct(private readonly RequestStack $stack)
    {
    }

    public function debug(): void
    {
        dump($this->stack->getCurrentRequest()->attributes->all());
    }
}