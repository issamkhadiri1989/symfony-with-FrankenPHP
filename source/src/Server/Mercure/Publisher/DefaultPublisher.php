<?php

declare(strict_types=1);

namespace App\Server\Mercure\Publisher;

use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;

final class DefaultPublisher implements PublisherInterface
{
    public function __construct(private readonly HubInterface $hub)
    {
    }

    public function publish(): void
    {
        $update = new Update(
            'https://localhost/books/1',
            \json_encode(['status' => 'OutOfStock']),
            private: true,
        );

        $this->hub->publish($update);
    }
}
