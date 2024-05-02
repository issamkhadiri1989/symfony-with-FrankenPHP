<?php

namespace App\Service\Routing;

use Symfony\Bundle\FrameworkBundle\Routing\RouteLoaderInterface;
use Symfony\Component\Routing\RouteCollection;

class RouteLoader implements RouteLoaderInterface
{
    public function load(): RouteCollection
    {
        $collection = new RouteCollection();

        return $collection;}
}