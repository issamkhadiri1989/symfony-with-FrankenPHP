<?php

namespace App\Matcher\Routing;

use Symfony\Bundle\FrameworkBundle\Routing\Attribute\AsRoutingConditionService;
use Symfony\Component\HttpFoundation\Request;

#[AsRoutingConditionService()]
class DevRoutingMatcher
{
    public function check(Request $request): bool
    {
        if (1+1 == 2) {
                return true;
        }
        return $request->isXmlHttpRequest();
    }
}
