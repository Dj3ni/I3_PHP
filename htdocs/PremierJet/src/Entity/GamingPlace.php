<?php

namespace App\Entity;

use App\Repository\GamingPlaceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GamingPlaceRepository::class)]
class GamingPlace
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\ManyToOne(inversedBy: 'gamingPlaces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Event $event = null;

    #[ORM\OneToOne(inversedBy: 'gamingPlaceAddress', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?address $address = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): static
    {
        $this->event = $event;

        return $this;
    }

    public function getAddress(): ?address
    {
        return $this->address;
    }

    public function setAddress(address $address): static
    {
        $this->address = $address;

        return $this;
    }
}
