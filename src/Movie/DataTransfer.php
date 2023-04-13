<?php

namespace App\Movie;

use Symfony\Component\Uid\Uuid;

class DataTransfer
{
    private string $title;
    private string $originalTitle;
    private bool $directorsCut;
    private string $additionalInfo;
    private array $director;
    private array $writer;
    private array $cast;
    private int $duration;
    private int $releaseYear;
    private string $medium;
    private string $blurb;
    private string $genre;

    public function __construct(private readonly Uuid $id)
    {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getOriginalTitle(): string
    {
        return $this->originalTitle;
    }

    public function isDirectorsCut(): bool
    {
        return $this->directorsCut;
    }

    public function getAdditionalInfo(): string
    {
        return $this->additionalInfo;
    }

    public function getDirector(): array
    {
        return $this->director;
    }

    public function getWriter(): array
    {
        return $this->writer;
    }

    public function getCast(): array
    {
        return $this->cast;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getReleaseYear(): int
    {
        return $this->releaseYear;
    }

    public function getMedium(): string
    {
        return $this->medium;
    }

    public function getBlurb(): string
    {
        return $this->blurb;
    }

    public function getGenre(): string
    {
        return $this->genre;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setOriginalTitle(string $originalTitle): void
    {
        $this->originalTitle = $originalTitle;
    }

    public function setDirectorsCut(bool $directorsCut): void
    {
        $this->directorsCut = $directorsCut;
    }

    public function setAdditionalInfo(string $additionalInfo): void
    {
        $this->additionalInfo = $additionalInfo;
    }

    public function setDirector(array $director): void
    {
        $this->director = $director;
    }

    public function setWriter(array $writer): void
    {
        $this->writer = $writer;
    }

    public function setCast(array $cast): void
    {
        $this->cast = $cast;
    }

    public function setDuration(int $duration): void
    {
        $this->duration = $duration;
    }

    public function setReleaseYear(int $releaseYear): void
    {
        $this->releaseYear = $releaseYear;
    }

    public function setMedium(string $medium): void
    {
        $this->medium = $medium;
    }

    public function setBlurb(string $blurb): void
    {
        $this->blurb = $blurb;
    }

    public function setGenre(string $genre): void
    {
        $this->genre = $genre;
    }

    public function exchangeArray(array $data): void
    {
        $this->title          = $data['title'] ?? '';
        $this->originalTitle  = $data['originalTitle'] ?? '';
        $this->directorsCut   = $data['directorsCut'] ?? '';
        $this->additionalInfo = $data['additionalInfo'] ?? '';
        $this->director       = $data['director'] ?? [];
        $this->writer         = $data['writer'] ?? [];
        $this->cast           = $data['cast'] ?? [];
        $this->duration       = $data['duration'] ?? 00;
        $this->releaseYear    = $data['releaseYear'] ?? 00;
        $this->medium         = $data['medium'] ?? '';
        $this->blurb          = $data['blurb'] ?? '';
        $this->genre          = $data['genre'] ?? '';
    }
}