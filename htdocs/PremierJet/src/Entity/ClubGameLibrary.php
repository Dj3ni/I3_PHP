<?php

namespace App\Entity;

use App\Repository\ClubGameLibraryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubGameLibraryRepository::class)]
class ClubGameLibrary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, GameLibraryHistoric>
     */
    #[ORM\OneToMany(targetEntity: GameLibraryHistoric::class, mappedBy: 'clubGameLibrary')]
    private Collection $historics;

    #[ORM\ManyToOne(inversedBy: 'gameLibraries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Club $club = null;

    public function __construct()
    {
        $this->historics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
            $historic->setClubGameLibrary($this);
        }

        return $this;
    }

    public function removeHistoric(GameLibraryHistoric $historic): static
    {
        if ($this->historics->removeElement($historic)) {
            // set the owning side to null (unless already changed)
            if ($historic->getClubGameLibrary() === $this) {
                $historic->setClubGameLibrary(null);
            }
        }

        return $this;
    }

    public function getClub(): ?Club
    {
        return $this->club;
    }

    public function setClub(?Club $club): static
    {
        $this->club = $club;

        return $this;
    }
}
