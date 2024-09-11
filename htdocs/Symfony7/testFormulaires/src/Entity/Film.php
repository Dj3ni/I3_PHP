<?php

namespace App\Entity;

use App\Repository\FilmRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FilmRepository::class)]
class Film
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $titre = null;

    #[ORM\Column(nullable: true)]
    private ?int $duree = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $synopsis = null;

    /**
     * @var Collection<int, Realisateur>
     */
    #[ORM\ManyToMany(targetEntity: Realisateur::class, inversedBy: 'palmares')]
    private Collection $oeuvre;

    /**
     * @var Collection<int, Acteur>
     */
    #[ORM\ManyToMany(targetEntity: Acteur::class, inversedBy: 'filmographie')]
    private Collection $casting;

    /**
     * @var Collection<int, exemplaire>
     */
    #[ORM\OneToMany(targetEntity: Exemplaire::class, mappedBy: 'film', cascade:["persist", "remove"])]
    private Collection $exemplaires;

    public function __construct($init)
    {
        $this-> hydrate($init);
        $this->oeuvre = new ArrayCollection();
        $this->casting = new ArrayCollection();
        $this->exemplaires = new ArrayCollection();
    }

    public function hydrate(array $init){
        foreach($init as $property => $value){
            $nomSet = "set".ucfirst($property);
            if (!method_exists($this, $nomSet)){
                // Throw new Exception
            }
            else{
                $this->$nomSet($value);
            }
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDuree(): ?int
    {
        return $this->duree;
    }

    public function setDuree(?int $duree): static
    {
        $this->duree = $duree;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(?string $synopsis): static
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    /**
     * @return Collection<int, Realisateur>
     */
    public function getOeuvre(): Collection
    {
        return $this->oeuvre;
    }

    public function addOeuvre(Realisateur $oeuvre): static
    {
        if (!$this->oeuvre->contains($oeuvre)) {
            $this->oeuvre->add($oeuvre);
        }

        return $this;
    }

    public function removeOeuvre(Realisateur $oeuvre): static
    {
        $this->oeuvre->removeElement($oeuvre);

        return $this;
    }

    /**
     * @return Collection<int, Acteur>
     */
    public function getCasting(): Collection
    {
        return $this->casting;
    }

    public function addCasting(Acteur $casting): static
    {
        if (!$this->casting->contains($casting)) {
            $this->casting->add($casting);
        }

        return $this;
    }

    public function removeCasting(Acteur $casting): static
    {
        $this->casting->removeElement($casting);

        return $this;
    }

    /**
     * @return Collection<int, exemplaire>
     */
    public function getExemplaires(): Collection
    {
        return $this->exemplaires;
    }

    public function addExemplaire(exemplaire $exemplaire): static
    {
        if (!$this->exemplaires->contains($exemplaire)) {
            $this->exemplaires->add($exemplaire);
            $exemplaire->setFilm($this);
        }

        return $this;
    }

    public function removeExemplaire(exemplaire $exemplaire): static
    {
        if ($this->exemplaires->removeElement($exemplaire)) {
            // set the owning side to null (unless already changed)
            if ($exemplaire->getFilm() === $this) {
                $exemplaire->setFilm(null);
            }
        }

        return $this;
    }

}
