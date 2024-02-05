<?php

namespace App\DataTransfer;

class Movie
{
    public string $publicationId;
    public string $title;
    public string $originalTitle;
    public string $genre;
    public string $medium;
    public int    $duration;
    public string $releaseYear;
    public string $directed;
    public string $screenplay;
    public string $starring;
    public string $blurb;

    public function __construct(string $publicationId)
    {
        $this->publicationId = $publicationId;
    }

    public function exchangeArray(array $data): void
    {
        $this->title         = $data['title'] ?? '';
        $this->originalTitle = $data['original_title'] ?? '';
        $this->genre         = $data['genre'] ?? '';
        $this->medium        = $data['medium'] ?? '';
        $this->duration      = $data['duration'] ?? 0;
        $this->releaseYear   = $data['release_year'] ?? '';
        $this->directed      = $data['directed'] ?? '';
        $this->screenplay    = $data['screenplay'] ?? '';
        $this->starring      = $data['starring'] ?? '';
        $this->blurb         = $data['blurb'] ?? '';
    }
}