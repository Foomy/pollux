<?php

namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks
 */
class User implements UserInterface
{
    /**
     * @var UuidInterface
     *
     * @ORM\Id()
     * @ORM\Column(type="uuid", unique=true)
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="Ramsey\Uuid\Doctrine\UuidGenerator")
     */
    private $id;

    /**
     * @ORM\Column(name="created_on", type="datetime", nullable=false, columnDefinition="TIMESTAMP DEFAULT CURRENT_TIMESTAMP")
     */
    private $createdOn;

    /**
     * @ORM\Column(type="string", length=50, nullable=false, options={"default": ""})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, nullable=false, options={"default": ""})
     */
    private $password;

    /**
     * @ORM\Column(type="boolean", nullable=false, options={"default": false})
     */
    private $canLogin;

    public function __construct(UUidInterface $id, string $username)
    {
        $this->id       = $id;
        $this->username = $username;
    }

    /**
     * @return UuidInterface
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @return DateTime
     * @throws Exception
     */
    public function getCreatedOn(): DateTime
    {
        return new DateTime($this->createdOn);
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     *
     * @return string
     */
    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param bool $canLogin
     */
    public function setCanLogin(bool $canLogin): void
    {
        $this->canLogin = $canLogin;
    }

    /**
     * @return bool
     */
    public function canLogin(): bool
    {
        return $this->canLogin;
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function getSalt(): ?string
    {
        return null;
    }

    public function eraseCredentials(): void
    {
        $this->password = null;
    }
}
