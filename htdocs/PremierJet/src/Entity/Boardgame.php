<?php

namespace App\Entity;

use App\Repository\BoardgameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BoardgameRepository::class)]
class Boardgame
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    /**
     * @var Collection<int, GameLibraryHistoric>
     */
    #[ORM\OneToMany(targetEntity: GameLibraryHistoric::class, mappedBy: 'boardgame')]
    private Collection $historics;

    public function __construct()
    {
        $this->historics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, GameLibraryHistoric>
     */
    public function getHistorics(): Collection
    {
        return $this->historics;
    }

    public function addHistoric(GameLibraryHistoric $historic): static
    {
        if (!$this->historics->contains($historic)) {
            $this->historics->add($historic);
            $historic->setBoardgame($this);
        }

        return $this;
    }

    public function removeHistoric(GameLibraryHistoric $historic): static
    {
        if ($this->historics->removeElement($historic)) {
            // set the owning side to null (unless already changed)
            if ($historic->getBoardgame() === $this) {
                $historic->setBoardgame(null);
            }
        }

        return $this;
    }
}
