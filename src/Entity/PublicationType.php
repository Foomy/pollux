<?php

namespace App\Entity;

use App\Repository\PublicationTypeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PublicationTypeRepository::class)]
class PublicationType
{
    #[ORM\Id]
    #[ORM\Column(length: 36)]
    private string $id = '';

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $created_on = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $last_modified = null;

    #[ORM\Column(length: 255)]
    private ?string $typename = null;

    public function getId(): string
    {
        return $this->id;
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

    public function setLastModified(\DateTimeInterface $last_modified): self
    {
        $this->last_modified = $last_modified;

        return $this;
    }

    public function getTypename(): ?string
    {
        return $this->typename;
    }

    public function setTypename(string $typename): self
    {
        $this->typename = $typename;

        return $this;
    }
}
