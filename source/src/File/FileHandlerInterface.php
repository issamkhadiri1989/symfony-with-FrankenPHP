<?php

declare(strict_types=1);

namespace App\File;

interface FileHandlerInterface
{
    /**
     * Deletes the filename.
     *
     * @param string $filename
     *
     * @return void
     */
    public function delete(string $filename): void;

    /**
     * Puts the content in the target file.
     *
     * @param string $filename
     * @param string $content
     *
     * @return void
     */
    public function upload(string $filename, string $content): void;

    /**
     * Download the content of the given file.
     *
     * @param string $filePath
     *
     * @return string
     */
    public function download(string $filePath): string;
}
