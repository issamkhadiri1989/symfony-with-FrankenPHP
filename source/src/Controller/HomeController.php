<?php

namespace App\Controller;

use App\Enum\OrderStatus;
use App\Service\Routing\Route as Routing;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Requirement\Requirement;

class HomeController extends AbstractController
{
    public function __invoke(): Response
    {
        return $this->render('page/page.html.twig');
    }

    #[Route("/restricted/{slug}", name: "app_restricted_area", methods: ['PUT'])]
    public function restrictedAction(Request $request, string $slug): Response
    {
        return $this->render('page/page.html.twig');
    }

    #[Route(name: "app_paged_index", path: "/index/{!page?1}", requirements: ['page' => Requirement::DIGITS])]
    public function paginate(int $page): Response
    {
        return $this->render('page/page.html.twig');
    }

    #[Route(name: "app_index", path: "/index/{slug}")]
    public function index(string $slug): Response
    {
        dump($slug);

        return $this->render('page/page.html.twig');
    }

    #[Route(name: "app_index_list", path: "/index/list", priority: 2,)]
    public function list(Request $request): Response
    {
        dump($request->attributes->all());

        return $this->render('page/page.html.twig');
    }

    #[Route(name: "app_order_list_by_status", path: "/order/list/{status}")]
    public function backedEnums(OrderStatus $status): Response
    {
        dump($status);
        return $this->render('page/page.html.twig');
    }

    #[Route(name: "app_order_new", path: "/order/new/{status}", defaults: ['title' => 'Issam'])]
    public function newOrder(string $title, Request $request, Routing $route, OrderStatus $status = OrderStatus::PENDING, ): Response
    {
        $routeName = $request->attributes->get('_route');
        $routeParameters = $request->attributes->get('_route_params');

        $route->debug();

        dump($title, $routeName, $routeParameters);
        return $this->render('page/page.html.twig');
    }
}
