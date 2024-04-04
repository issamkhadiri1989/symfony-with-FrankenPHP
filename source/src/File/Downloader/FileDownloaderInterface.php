<?php

namespace App\File\Downloader;

interface FileDownloaderInterface
{
    public function download(string $path): void;
}