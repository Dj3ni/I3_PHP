<?php

namespace App\Entity;

use App\Repository\ClubGameLibraryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubGameLibraryRepository::class)]
class ClubGameLibrary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $space = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpace(): ?string
    {
        return $this->space;
    }

    public function setSpace(?string $space): static
    {
        $this->space = $space;

        return $this;
    }
}
