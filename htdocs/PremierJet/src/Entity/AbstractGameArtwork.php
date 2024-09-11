<?php

namespace App\Entity;

use App\Repository\AbstractGameArtworkRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AbstractGameArtworkRepository::class)]
class AbstractGameArtwork
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $Title = null;

    #[ORM\Column]
    private ?int $MinPlayers = null;

    #[ORM\Column]
    private ?int $MaxPlayers = null;

    #[ORM\Column]
    private ?int $AgeMin = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $picture = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getMinPlayers(): ?int
    {
        return $this->MinPlayers;
    }

    public function setMinPlayers(int $MinPlayers): static
    {
        $this->MinPlayers = $MinPlayers;

        return $this;
    }

    public function getMaxPlayers(): ?int
    {
        return $this->MaxPlayers;
    }

    public function setMaxPlayers(int $MaxPlayers): static
    {
        $this->MaxPlayers = $MaxPlayers;

        return $this;
    }

    public function getAgeMin(): ?int
    {
        return $this->AgeMin;
    }

    public function setAgeMin(int $AgeMin): static
    {
        $this->AgeMin = $AgeMin;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }
}
