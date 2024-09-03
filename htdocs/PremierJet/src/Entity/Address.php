<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $street = null;

    #[ORM\Column(length: 20)]
    private ?string $number = null;

    #[ORM\Column(length: 150)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $postalCode = null;

    #[ORM\Column(length: 150)]
    private ?string $Country = null;

    #[ORM\OneToOne(mappedBy: 'isPlaced', cascade: ['persist', 'remove'])]
    private ?Club $clubAddress = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStreet(): ?string
    {
        return $this->street;
    }

    public function setStreet(string $street): static
    {
        $this->street = $street;

        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(string $number): static
    {
        $this->number = $number;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postalCode;
    }

    public function setPostalCode(int $postalCode): static
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->Country;
    }

    public function setCountry(string $Country): static
    {
        $this->Country = $Country;

        return $this;
    }

    public function getClubAddress(): ?Club
    {
        return $this->clubAddress;
    }

    public function setClubAddress(Club $clubAddress): static
    {
        // set the owning side of the relation if necessary
        if ($clubAddress->getIsPlaced() !== $this) {
            $clubAddress->setIsPlaced($this);
        }

        $this->clubAddress = $clubAddress;

        return $this;
    }
}
