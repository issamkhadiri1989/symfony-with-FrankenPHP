<?php

namespace App\Service\Routing;

use Symfony\Component\HttpFoundation\RequestStack;

class Session
{
    public function __construct(private readonly RequestStack $stack)
    {
    }

    public function useUnexpectedSession(): void
    {
        $session = $this->stack->getSession();

        $session->set('time', time());
    }
}