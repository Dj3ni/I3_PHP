<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Name = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    /**
     * @var Collection<int, ClubSubscription>
     */
    #[ORM\OneToMany(targetEntity: ClubSubscription::class, mappedBy: 'SubscriptedClub')]
    private Collection $isLinkedTo;

    #[ORM\OneToOne(inversedBy: 'clubAddress', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Address $isPlaced = null;

    public function __construct()
    {
        $this->isLinkedTo = new ArrayCollection();
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

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(?string $phoneNumber): static
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, ClubSubscription>
     */
    public function getIsLinkedTo(): Collection
    {
        return $this->isLinkedTo;
    }

    public function addIsLinkedTo(ClubSubscription $isLinkedTo): static
    {
        if (!$this->isLinkedTo->contains($isLinkedTo)) {
            $this->isLinkedTo->add($isLinkedTo);
            $isLinkedTo->setSubscriptedClub($this);
        }

        return $this;
    }

    public function removeIsLinkedTo(ClubSubscription $isLinkedTo): static
    {
        if ($this->isLinkedTo->removeElement($isLinkedTo)) {
            // set the owning side to null (unless already changed)
            if ($isLinkedTo->getSubscriptedClub() === $this) {
                $isLinkedTo->setSubscriptedClub(null);
            }
        }

        return $this;
    }

    public function getIsPlaced(): ?Address
    {
        return $this->isPlaced;
    }

    public function setIsPlaced(Address $isPlaced): static
    {
        $this->isPlaced = $isPlaced;

        return $this;
    }
}
