<?php

namespace App\Movie;

use App\Entity\Metavalue;
use App\Entity\Publication;
use App\Repository\MetakeyRepository;
use App\Repository\MetavalueRepository;
use App\Repository\PublicationRepository;
use App\Repository\PublicationTypeRepository;
use App\Movie\DataTransfer as MovieDto;
use Doctrine\ORM\Cache\Exception\FeatureNotImplemented;
use PHPUnit\Exception;
use Symfony\Component\Uid\Uuid;

class Service
{
    public const GENRE_SORTING_ALPHA  = 0;
    public const GENRE_SORTING_AMOUNT = 1;

    public function __construct(
        private readonly PublicationRepository     $publicationRepository,
        private readonly PublicationTypeRepository $publicationTypeRepository,
        private readonly MetakeyRepository         $metakeyRepository,
        private readonly MetavalueRepository       $metavalueRepository
    )
    {
    }

    /**
     * @return array<MovieDto>
     */
    public function getAll(): array
    {
        $movies = [];

        $publicationType = $this->publicationTypeRepository->findOneBy([
            'typename' => 'movie'
        ]);

        if (null === $publicationType) {
            return [];
        }

        $publications = $this->publicationRepository->findByPublicationType($publicationType);

        /** @var Publication $publication */
        foreach ($publications as $publication) {
            $movieData  = [];
            $movie      = new DataTransfer($publication->getId());
            $metaValues = $this->metavalueRepository->findByPublication($publication);

            /** @var Metavalue $metaValue */
            foreach ($metaValues as $metaValue) {
                $metaKey = $this->metakeyRepository->findById($metaValue->getMetakeyId());

                if (null !== $metaKey) {
                    $movieData[$metaKey->getKeyname()] = $metaValue->getValue();
                }
            }

            $movie->exchangeArray($movieData);

            $movies[] = $movie;
        }

        return $movies;
    }

    public function getById(string $movieId): MovieDto
    {
        $movie = new MovieDto(Uuid::fromString($movieId));

        $publication = $this->publicationRepository->find($movieId);

        if (null !== $publication) {
            $metaValues = $this->metavalueRepository->findByPublication($publication);

            /** @var Metavalue $metaValue */
            foreach ($metaValues as $metaValue) {
                $metaKey = $this->metakeyRepository->findById($metaValue->getMetakeyId());

                $movieData[$metaKey->getKeyname()] = $metaValue->getValue();
            }

            $movie->exchangeArray($movieData);

            return $movie;
        }

        throw new NotFoundException('Movie not found in database.');
    }

    /**
     * @return array<MovieDto>
     */
    public function getGenres(int $sorting = self::GENRE_SORTING_ALPHA): array
    {
        return [];
    }
}