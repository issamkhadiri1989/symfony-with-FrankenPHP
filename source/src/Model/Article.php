<?php

namespace App\Model;

class Article
{
    public function __construct(public string $name, public string $content)
    {
    }
}