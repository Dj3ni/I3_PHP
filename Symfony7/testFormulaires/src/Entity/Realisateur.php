<?php

namespace App\Entity;

use App\Repository\RealisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealisateurRepository::class)]
class Realisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $nom = null;

    #[ORM\Column(length: 150)]
    private ?string $prenom = null;

    /**
     * @var Collection<int, Film>
     */
    #[ORM\ManyToMany(targetEntity: Film::class, mappedBy: 'oeuvre')]
    private Collection $palmares;

    public function __construct()
    {
        $this->palmares = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return Collection<int, Film>
     */
    public function getPalmares(): Collection
    {
        return $this->palmares;
    }

    public function addPalmare(Film $palmare): static
    {
        if (!$this->palmares->contains($palmare)) {
            $this->palmares->add($palmare);
            $palmare->addOeuvre($this);
        }

        return $this;
    }

    public function removePalmare(Film $palmare): static
    {
        if ($this->palmares->removeElement($palmare)) {
            $palmare->removeOeuvre($this);
        }

        return $this;
    }
}
