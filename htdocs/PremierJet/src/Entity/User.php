<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $Name = null;

    #[ORM\Column(length: 150)]
    private ?string $Firstname = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $PhoneNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    /**
     * @var Collection<int, ClubSubscription>
     */
    #[ORM\OneToMany(targetEntity: ClubSubscription::class, mappedBy: 'subscriptedUser')]
    private Collection $isSubscribedTo;

    public function __construct()
    {
        $this->isSubscribedTo = new ArrayCollection();
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

    public function getFirstname(): ?string
    {
        return $this->Firstname;
    }

    public function setFirstname(string $Firstname): static
    {
        $this->Firstname = $Firstname;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->PhoneNumber;
    }

    public function setPhoneNumber(?string $PhoneNumber): static
    {
        $this->PhoneNumber = $PhoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * @return Collection<int, ClubSubscription>
     */
    public function getIsSubscribedTo(): Collection
    {
        return $this->isSubscribedTo;
    }

    public function addIsSubscribedTo(ClubSubscription $isSubscribedTo): static
    {
        if (!$this->isSubscribedTo->contains($isSubscribedTo)) {
            $this->isSubscribedTo->add($isSubscribedTo);
            $isSubscribedTo->setSubscriptedUser($this);
        }

        return $this;
    }

    public function removeIsSubscribedTo(ClubSubscription $isSubscribedTo): static
    {
        if ($this->isSubscribedTo->removeElement($isSubscribedTo)) {
            // set the owning side to null (unless already changed)
            if ($isSubscribedTo->getSubscriptedUser() === $this) {
                $isSubscribedTo->setSubscriptedUser(null);
            }
        }
        return $this;
    }
}
