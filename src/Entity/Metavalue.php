<?php

namespace App\Entity;

use App\Repository\MetavalueRepository;
use DateTimeInterface;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: MetavalueRepository::class)]
class Metavalue
{
    #[ORM\Id]
    #[ORM\Column]
    private string $id;

    #[ORM\Column]
    private string $metakeyId;

    #[ORM\Column]
    private string $publicationId;

    #[ORM\Column]
    private string $personId;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $createdOn = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?DateTimeInterface $lastModified = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $value = null;

    public function getId(): Uuid
    {
        return Uuid::fromRfc4122($this->id);
    }

        public function getMetakeyId(): ?Uuid
    {
        return Uuid::fromRfc4122($this->metakeyId);
    }

    public function setMetakeyId(Uuid $metakeyId): self
    {
        $this->metakeyId = $metakeyId->toRfc4122();

        return $this;
    }

    public function getPublicationId(): ?Uuid
    {
        return Uuid::fromRfc4122($this->publicationId);
    }

    public function setPublicationId(Uuid $publicationId): self
    {
        $this->publicationId = $publicationId->toRfc4122();

        return $this;
    }

    public function getPersonId(): ?Uuid
    {
        return Uuid::fromRfc4122($this->personId);
    }

    public function setPersonId(Uuid $personId): self
    {
        $this->personId = $personId->toRfc4122();

        return $this;
    }

    public function getCreatedOn(): ?DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getLastModified(): ?DateTimeInterface
    {
        return $this->lastModified;
    }

    public function setLastModified(DateTimeInterface $lastModified): self
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    public function getValue(): ?string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }
}
