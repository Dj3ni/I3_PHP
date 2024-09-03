<?php

namespace App\Entity;

use App\Repository\ClubSubscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubSubscriptionRepository::class)]
class ClubSubscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $subscriptionDate = null;

    #[ORM\Column]
    private ?bool $isContributionOk = null;

    #[ORM\ManyToOne(inversedBy: 'isSubscibedTo')]
    private ?User $subscriptedUser = null;

    #[ORM\ManyToOne(inversedBy: 'isLinkedTo')]
    private ?Club $SubscriptedClub = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubscriptionDate(): ?\DateTimeImmutable
    {
        return $this->subscriptionDate;
    }

    public function setSubscriptionDate(\DateTimeImmutable $subscriptionDate): static
    {
        $this->subscriptionDate = $subscriptionDate;

        return $this;
    }

    public function isContributionOk(): ?bool
    {
        return $this->isContributionOk;
    }

    public function setContributionOk(bool $isContributionOk): static
    {
        $this->isContributionOk = $isContributionOk;

        return $this;
    }

    public function getSubscriptedUser(): ?User
    {
        return $this->subscriptedUser;
    }

    public function setSubscriptedUser(?User $subscriptedUser): static
    {
        $this->subscriptedUser = $subscriptedUser;

        return $this;
    }

    public function getSubscriptedClub(): ?Club
    {
        return $this->SubscriptedClub;
    }

    public function setSubscriptedClub(?Club $SubscriptedClub): static
    {
        $this->SubscriptedClub = $SubscriptedClub;

        return $this;
    }
}
