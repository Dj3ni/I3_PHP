<?php

namespace App\Entity;

use App\Repository\GameArtworkRepository;
use App\Trait\HydrateTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameArtworkRepository::class)]
class GameArtwork
{
    use HydrateTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $title = null;

    #[ORM\Column]
    private ?int $minPlayers = null;

    #[ORM\Column]
    private ?int $maxPlayers = null;

    #[ORM\Column]
    private ?int $ageMin = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $picture = null;

    /**
     * @var Collection<int, GameManagement>
     */
    #[ORM\OneToMany(targetEntity: GameManagement::class, mappedBy: 'gameArtwork', orphanRemoval: true)]
    private Collection $isManagedby;

    #[ORM\Column(length: 150)]
    private ?string $editor = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $edition = null;

    public function __construct(array $init =[])
    {
        $this->hydrate($init);
        $this->isManagedby = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getMinPlayers(): ?int
    {
        return $this->minPlayers;
    }

    public function setMinPlayers(int $minPlayers): static
    {
        $this->minPlayers = $minPlayers;

        return $this;
    }

    public function getMaxPlayers(): ?int
    {
        return $this->maxPlayers;
    }

    public function setMaxPlayers(int $maxPlayers): static
    {
        $this->maxPlayers = $maxPlayers;

        return $this;
    }

    public function getAgeMin(): ?int
    {
        return $this->ageMin;
    }

    public function setAgeMin(int $ageMin): static
    {
        $this->ageMin = $ageMin;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * @return Collection<int, GameManagement>
     */
    public function getIsManagedby(): Collection
    {
        return $this->isManagedby;
    }

    public function addIsManagedby(GameManagement $isManagedby): static
    {
        if (!$this->isManagedby->contains($isManagedby)) {
            $this->isManagedby->add($isManagedby);
            $isManagedby->setGameArtwork($this);
        }

        return $this;
    }

    public function removeIsManagedby(GameManagement $isManagedby): static
    {
        if ($this->isManagedby->removeElement($isManagedby)) {
            // set the owning side to null (unless already changed)
            if ($isManagedby->getGameArtwork() === $this) {
                $isManagedby->setGameArtwork(null);
            }
        }

        return $this;
    }

    public function getEditor(): ?string
    {
        return $this->editor;
    }

    public function setEditor(string $editor): static
    {
        $this->editor = $editor;

        return $this;
    }

    public function getEdition(): ?string
    {
        return $this->edition;
    }

    public function setEdition(?string $edition): static
    {
        $this->edition = $edition;

        return $this;
    }
}
