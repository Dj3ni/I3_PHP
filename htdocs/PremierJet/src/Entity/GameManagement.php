<?php

namespace App\Entity;

use App\Repository\GameManagementRepository;
use App\Trait\HydrateTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameManagementRepository::class)]
class GameManagement
{
    use HydrateTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'gameManagement')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'isManagedby')]
    #[ORM\JoinColumn(nullable: true)]
    private ?GameArtwork $gameArtwork = null;

    public function __construct(array $init = [])
    {
        $this->hydrate($init);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getGameArtwork(): ?GameArtwork
    {
        return $this->gameArtwork;
    }

    public function setGameArtwork(?GameArtwork $gameArtwork): static
    {
        $this->gameArtwork = $gameArtwork;

        return $this;
    }
}
