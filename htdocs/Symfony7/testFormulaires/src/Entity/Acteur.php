<?php

namespace App\Entity;

use App\Repository\ActeurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ActeurRepository::class)]
class Acteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 155)]
    private ?string $nom = null;

    #[ORM\Column(length: 155)]
    private ?string $prenom = null;

    /**
     * @var Collection<int, Film>
     */
    #[ORM\ManyToMany(targetEntity: Film::class, mappedBy: 'casting')]
    private Collection $filmographie;

    public function __construct(array $init)
    {
        $this ->hydrate($init);
        $this->filmographie = new ArrayCollection();
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
    public function getFilmographie(): Collection
    {
        return $this->filmographie;
    }

    public function addFilmographie(Film $filmographie): static
    {
        if (!$this->filmographie->contains($filmographie)) {
            $this->filmographie->add($filmographie);
            $filmographie->addCasting($this);
        }

        return $this;
    }

    public function removeFilmographie(Film $filmographie): static
    {
        if ($this->filmographie->removeElement($filmographie)) {
            $filmographie->removeCasting($this);
        }

        return $this;
    }
}
