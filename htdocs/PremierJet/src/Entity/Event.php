<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateStart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\Column(nullable: true)]
    private ?int $dateOccurency = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $type = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $fee = null;

    #[ORM\ManyToOne(inversedBy: 'OrganizedEvents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userOrganisator = null;

    /**
     * @var Collection<int, eventSubscription>
     */
    #[ORM\OneToMany(targetEntity: eventSubscription::class, mappedBy: 'eventSubscripted', orphanRemoval: true)]
    private Collection $subscriptions;

    /**
     * @var Collection<int, GamingPlace>
     */
    #[ORM\OneToMany(targetEntity: GamingPlace::class, mappedBy: 'event', orphanRemoval: true)]
    private Collection $gamingPlaces;

    public function __construct()
    {
        $this->subscriptions = new ArrayCollection();
        $this->gamingPlaces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): static
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): static
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getDateOccurency(): ?int
    {
        return $this->dateOccurency;
    }

    public function setDateOccurency(?int $dateOccurency): static
    {
        $this->dateOccurency = $dateOccurency;

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

    public function getFee(): ?string
    {
        return $this->fee;
    }

    public function setFee(string $fee): static
    {
        $this->fee = $fee;

        return $this;
    }

    public function getUserOrganisator(): ?User
    {
        return $this->userOrganisator;
    }

    public function setUserOrganisator(?User $userOrganisator): static
    {
        $this->userOrganisator = $userOrganisator;

        return $this;
    }

    /**
     * @return Collection<int, eventSubscription>
     */
    public function getSubscriptions(): Collection
    {
        return $this->subscriptions;
    }

    public function addSubscription(eventSubscription $subscription): static
    {
        if (!$this->subscriptions->contains($subscription)) {
            $this->subscriptions->add($subscription);
            $subscription->setEventSubscripted($this);
        }

        return $this;
    }

    public function removeSubscription(eventSubscription $subscription): static
    {
        if ($this->subscriptions->removeElement($subscription)) {
            // set the owning side to null (unless already changed)
            if ($subscription->getEventSubscripted() === $this) {
                $subscription->setEventSubscripted(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, GamingPlace>
     */
    public function getGamingPlaces(): Collection
    {
        return $this->gamingPlaces;
    }

    public function addGamingPlace(GamingPlace $gamingPlace): static
    {
        if (!$this->gamingPlaces->contains($gamingPlace)) {
            $this->gamingPlaces->add($gamingPlace);
            $gamingPlace->setEvent($this);
        }

        return $this;
    }

    public function removeGamingPlace(GamingPlace $gamingPlace): static
    {
        if ($this->gamingPlaces->removeElement($gamingPlace)) {
            // set the owning side to null (unless already changed)
            if ($gamingPlace->getEvent() === $this) {
                $gamingPlace->setEvent(null);
            }
        }

        return $this;
    }
}
