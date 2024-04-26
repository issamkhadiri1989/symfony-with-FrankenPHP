<?php

namespace App\Command\Routing;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[AsCommand(name: 'app:route:generate')]
class RoutingGeneratorCommand extends Command
{
    public function __construct(private UrlGeneratorInterface $generator)
    {
        parent::__construct();
    }

    protected function execute(InputInterface $in, OutputInterface $out): int
    {
//        $this->generator->getContext()->setScheme('https');
        $url = $this->generator->generate('localized', referenceType: UrlGeneratorInterface::ABSOLUTE_URL);
        dump($url);

        return Command::SUCCESS;
    }
}