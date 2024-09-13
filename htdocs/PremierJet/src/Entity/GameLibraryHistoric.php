<?php

namespace App\Entity;

use App\Repository\GameLibraryHistoricRepository;
use App\Trait\HydrateTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameLibraryHistoricRepository::class)]
class GameLibraryHistoric
{
    use HydrateTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'library')]
    #[ORM\JoinColumn(nullable: true)]
    private ?ClubGameLibrary $clubGameLibrary = null;

    #[ORM\ManyToOne(inversedBy: 'boardgame')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Boardgame $boardgame = null;

    public function __construct(array $init = [])
    {
        $this->hydrate($init);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClubGameLibrary(): ?ClubGameLibrary
    {
        return $this->clubGameLibrary;
    }

    public function setClubGameLibrary(?ClubGameLibrary $clubGameLibrary): static
    {
        $this->clubGameLibrary = $clubGameLibrary;

        return $this;
    }

    public function getBoardgame(): ?Boardgame
    {
        return $this->boardgame;
    }

    public function setBoardgame(?Boardgame $boardgame): static
    {
        $this->boardgame = $boardgame;

        return $this;
    }
}
