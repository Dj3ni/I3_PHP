<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $firstname = null;

    #[ORM\Column(length: 150)]
    private ?string $lastname = null;

    #[ORM\Column(length: 50)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\OneToOne(mappedBy: 'useraddress', cascade: ['persist', 'remove'])]
    private ?Address $address = null;

    /**
     * @var Collection<int, GameManagement>
     */
    #[ORM\OneToMany(targetEntity: GameManagement::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $gameManagement;

    /**
     * @var Collection<int, ClubSubscription>
     */
    #[ORM\OneToMany(targetEntity: ClubSubscription::class, mappedBy: 'userSubscriptor')]
    private Collection $clubSubscriptions;

    /**
     * @var Collection<int, eventSubscription>
     */
    #[ORM\OneToMany(targetEntity: eventSubscription::class, mappedBy: 'userSubscriptor', orphanRemoval: true)]
    private Collection $eventSubscriptions;

    /**
     * @var Collection<int, Event>
     */
    #[ORM\OneToMany(targetEntity: Event::class, mappedBy: 'userOrganisator', orphanRemoval: true)]
    private Collection $organizedEvents;

    public function __construct()
    {
        $this->gameManagement = new ArrayCollection();
        $this->clubSubscriptions = new ArrayCollection();
        $this->eventSubscriptions = new ArrayCollection();
        $this->organizedEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

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

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(Address $address): static
    {
        // set the owning side of the relation if necessary
        if ($address->getUseraddress() !== $this) {
            $address->setUseraddress($this);
        }

        $this->address = $address;

        return $this;
    }

    /**
     * @return Collection<int, GameManagement>
     */
    public function getGameManagement(): Collection
    {
        return $this->gameManagement;
    }

    public function addGameManagement(GameManagement $gameManagement): static
    {
        if (!$this->gameManagement->contains($gameManagement)) {
            $this->gameManagement->add($gameManagement);
            $gameManagement->setUser($this);
        }

        return $this;
    }

    public function removeGameManagement(GameManagement $gameManagement): static
    {
        if ($this->gameManagement->removeElement($gameManagement)) {
            // set the owning side to null (unless already changed)
            if ($gameManagement->getUser() === $this) {
                $gameManagement->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ClubSubscription>
     */
    public function getClubSubscriptions(): Collection
    {
        return $this->clubSubscriptions;
    }

    public function addClubSubscription(ClubSubscription $clubSubscription): static
    {
        if (!$this->clubSubscriptions->contains($clubSubscription)) {
            $this->clubSubscriptions->add($clubSubscription);
            $clubSubscription->setUserSubscriptor($this);
        }

        return $this;
    }

    public function removeClubSubscription(ClubSubscription $clubSubscription): static
    {
        if ($this->clubSubscriptions->removeElement($clubSubscription)) {
            // set the owning side to null (unless already changed)
            if ($clubSubscription->getUserSubscriptor() === $this) {
                $clubSubscription->setUserSubscriptor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, eventSubscription>
     */
    public function getEventSubscriptions(): Collection
    {
        return $this->eventSubscriptions;
    }

    public function addEventSubscription(eventSubscription $eventSubscription): static
    {
        if (!$this->eventSubscriptions->contains($eventSubscription)) {
            $this->eventSubscriptions->add($eventSubscription);
            $eventSubscription->setUserSubscriptor($this);
        }

        return $this;
    }

    public function removeEventSubscription(eventSubscription $eventSubscription): static
    {
        if ($this->eventSubscriptions->removeElement($eventSubscription)) {
            // set the owning side to null (unless already changed)
            if ($eventSubscription->getUserSubscriptor() === $this) {
                $eventSubscription->setUserSubscriptor(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getOrganizedEvents(): Collection
    {
        return $this->organizedEvents
;
    }

    public function addOrganizedEvents(Event $organizedEvents): static
    {
        if (!$this->organizedEvents->contains($organizedEvents
)) {
            $this->organizedEvents->add($organizedEvents
);
            $organizedEvents->setUserOrganisator($this);
        }

        return $this;
    }

    public function removeOrganizedEvents(Event $organizedEvents): static
    {
        if ($this->organizedEvents->removeElement($organizedEvents)) {
            // set the owning side to null (unless already changed)
            if ($organizedEvents->getUserOrganisator() === $this) {
                $organizedEvents->setUserOrganisator(null);
            }
        }

        return $this;
    }
}
