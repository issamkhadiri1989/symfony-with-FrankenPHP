<?php

declare(strict_types=1);

namespace App\File\Downloader;

use League\Flysystem\FilesystemOperator;
use Symfony\Component\DependencyInjection\Attribute\Target;

class CloudFileDownloader implements FileDownloaderInterface
{
    private FilesystemOperator $storage;

    public function __construct(#[Target('awsStorage')] FilesystemOperator $storage)
    {
        $this->storage = $storage;
    }

    public function download(string $path): void
    {
        $this->storage->delete('container.png');
    }
}
