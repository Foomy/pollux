<?php

namespace App\Entity;

use App\Repository\PublicationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: PublicationRepository::class)]
class Publication
{
    #[ORM\Id]
    #[ORM\Column(length: 36)]
    private string $id = '';

    #[ORM\Column(length: 36)]
    private ?string $publication_type_id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_on = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $last_modified = null;

    public function getId(): Uuid
    {
        return Uuid::fromRfc4122($this->id);
    }

    public function setId(Uuid $id): void
    {
        $this->id = $id->toRfc4122();
    }

    public function getPublicationTypeId(): ?string
    {
        return $this->publication_type_id;
    }

    public function setPublicationtypeId(string $publicationTypeId): self
    {
        $this->publication_type_id = $publicationTypeId;

        return $this;
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->created_on;
    }

    public function setCreatedOn(\DateTimeInterface $created_on): self
    {
        $this->created_on = $created_on;

        return $this;
    }

    public function getLastModified(): ?\DateTimeInterface
    {
        return $this->last_modified;
    }

    public function setLastModified(?\DateTimeInterface $last_modified): self
    {
        $this->last_modified = $last_modified;

        return $this;
    }
}
