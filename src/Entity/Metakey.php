<?php

namespace App\Entity;

use App\Repository\MetakeyRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: MetakeyRepository::class)]
class Metakey
{
    #[ORM\Id]
    #[ORM\Column]
    private string $id;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdOn = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $lastModified = null;

    #[ORM\Column(length: 255)]
    private ?string $keyname = null;

    public function getId(): Uuid
    {
        return Uuid::fromRfc4122($this->id);
    }

    public function getCreatedOn(): ?\DateTimeInterface
    {
        return $this->createdOn;
    }

    public function setCreatedOn(\DateTimeInterface $createdOn): self
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    public function getLastModified(): ?\DateTimeInterface
    {
        return $this->lastModified;
    }

    public function setLastModified(\DateTimeInterface $lastModified): self
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    public function getKeyname(): ?string
    {
        return $this->keyname;
    }

    public function setKeyname(string $keyname): self
    {
        $this->keyname = $keyname;

        return $this;
    }
}
