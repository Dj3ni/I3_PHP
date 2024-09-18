<?php

namespace App\Entity;

use App\Repository\AirportRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AirportRepository::class)]
class Airport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 5)]
    private ?string $Code = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $DateMiseEnService = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $heureMiseEnService = null;

    // Hydrate
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
    public function __construct(array $init){
        $this->hydrate($init);
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): static
    {
        $this->Name = $Name;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->Code;
    }

    public function setCode(string $Code): static
    {
        $this->Code = $Code;

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

    public function getDateMiseEnService(): ?\DateTimeInterface
    {
        return $this->DateMiseEnService;
    }

    public function setDateMiseEnService(\DateTimeInterface $DateMiseEnService): static
    {
        $this->DateMiseEnService = $DateMiseEnService;

        return $this;
    }

    public function getHeureMiseEnService(): ?\DateTimeInterface
    {
        return $this->heureMiseEnService;
    }

    public function setHeureMiseEnService(\DateTimeInterface $heureMiseEnService): static
    {
        $this->heureMiseEnService = $heureMiseEnService;

        return $this;
    }
}
