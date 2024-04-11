<?php

namespace App\Elasticsearch\Finder;

interface DocumentManagerInterface
{
    public function getAll(): array;

    public function update(): void;
}