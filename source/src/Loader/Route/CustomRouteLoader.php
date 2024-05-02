<?php

namespace App\Loader\Route;

use App\Controller\Json\LoadedJsonController;
use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Symfony\Component\HttpKernel\Config\FileLocator;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

class CustomRouteLoader extends Loader
{
    private Filesystem $locator;
    private ParameterBagInterface $parameterBag;
    private SerializerInterface $serializer;

    public function __construct(
        Filesystem $locator,
        ParameterBagInterface $parameterBag,
        DecoderInterface $serializer ,
        ?string $env = null
    ) {
        $this->locator = $locator;
        $this->parameterBag = $parameterBag;
        parent::__construct($env);
        $this->serializer = $serializer;
    }

    public function load(mixed $resource, ?string $type = null): mixed
    {
        $projectDir = $this->parameterBag->get('kernel.project_dir');

        /*$file = $dir = $this->locator->locate($resource, $projectDir . '/config');*/

        $file = Path::makeAbsolute($resource, $projectDir . '/config');

        $routes = $this->serializer->decode(\file_get_contents($file), 'json');

        foreach ($routes as $routeName => $configuration) {

        }

        $collection = new RouteCollection();

        $path = '/loader/custom/route/{parameter}';

        $defaults = [
            '_controller' => LoadedJsonController::class.'::jsonAction',
        ];

        $requirements = [
            'parameter' => '\d+',
            '_locale' => 'fr|en'
        ];

        // create a new Route instance
        $route = new Route(
            host: '{_locale}.json-loader.com.localhost',
            defaults: $defaults,
            requirements: $requirements,
            path: $path
        );

        $name = 'extra_route';

        $collection->add($name, $route);

        return $collection;
    }

    public function supports(mixed $resource, ?string $type = null): bool
    {
        return 'json' === \strtolower($type);
    }
}