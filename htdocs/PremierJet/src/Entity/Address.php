<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Trait\HydrateTrait;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    use HydrateTrait;
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $locality = null;

    #[ORM\Column(length: 255)]
    private ?string $street = null;

    #[ORM\Column(length: 50)]
    private ?string $number = null;

    #[ORM\Column(length: 150)]
    private ?string $city = null;

    #[ORM\Column]
    private ?int $postalCode = null;

    #[ORM\Column(length: 150)]
    private ?string $country = null;

    #[ORM\OneToOne(inversedBy: 'address', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $useraddress = null;

    #[ORM\OneToOne(mappedBy: 'address', cascade: ['persist', 'remove'])]
    private ?Club $clubAddress = null;

    #[ORM\OneToOne(mappedBy: 'address', cascade: ['persist', 'remove'])]
    private ?GamingPlace $gamingPlaceAddress = null;
    // OneToOne relation


    public function __construct(array $init = []){
        $this->hydrate($init);
    }
    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLocality(): ?string
    {
        return $this->locality;
    }

    public function setLocality(?string $locality): static
    {
        $this->locality = $locality;

        return $this;
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
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    public function getUseraddress(): ?User
    {
        return $this->useraddress;
    }

    public function setUseraddress(User $useraddress): static
    {
        $this->useraddress = $useraddress;

        return $this;
    }

    public function getClubAddress(): ?Club
    {
        return $this->clubAddress;
    }

    public function setClubAddress(Club $clubAddress): static
    {
        // set the owning side of the relation if necessary
        if ($clubAddress->getAddress() !== $this) {
            $clubAddress->setAddress($this);
        }

        $this->clubAddress = $clubAddress;

        return $this;
    }

    public function getGamingPlaceAddress(): ?GamingPlace
    {
        return $this->gamingPlaceAddress;
    }

    public function setGamingPlaceAddress(GamingPlace $gamingPlaceAddress): static
    {
        // set the owning side of the relation if necessary
        if ($gamingPlaceAddress->getAddress() !== $this) {
            $gamingPlaceAddress->setAddress($this);
        }

        $this->gamingPlaceAddress = $gamingPlaceAddress;

        return $this;
    }
}
