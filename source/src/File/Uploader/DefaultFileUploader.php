<?php

declare(strict_types=1);

namespace App\File\Uploader;

use App\Server\Mercure\Publisher\PublisherInterface;
use Doctrine\ORM\EntityManagerInterface;
use League\Flysystem\FilesystemException;
use League\Flysystem\FilesystemOperator;
use Symfony\Component\DependencyInjection\Attribute\Target;
use Symfony\Component\HttpFoundation\File\UploadedFile;

final class DefaultFileUploader implements FileUploaderInterface
{
    private readonly FilesystemOperator $storage;
    private PublisherInterface $publisher;

    public function __construct(#[Target('awsStorage')] FilesystemOperator $storage, PublisherInterface $publisher)
    {
        $this->storage = $storage;
        $this->publisher = $publisher;
    }

    public function upload(UploadedFile $file): void
    {
        try {
            $this->storage->write($file->getClientOriginalName(), \file_get_contents($file->getPathname()));
            $this->publisher->publish(
                'http://localhost/books/1',
                \json_encode(['src' => 'http://localhost:9000/resumes/issam.jpg']),
            );
        } catch (FilesystemException $e) {
            dd($e->getMessage());
        }
    }
}
