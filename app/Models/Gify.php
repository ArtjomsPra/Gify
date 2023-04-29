<?php declare(strict_types=1);

namespace Gifyv2\Models;

class Gify
{
    private string $name;
    private string $url;
    private string $id;
    private string $rating;

    public function __construct (string $name, string $url, string $id, string $rating) {
        $this->name = $name;
        $this->url = $url;
        $this->id = $id;
        $this->rating = $rating;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getRating(): string
    {
        return $this->rating;
    }
}
