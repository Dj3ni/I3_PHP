<?php

namespace App\Entity;

use App\Repository\ClubSubscriptionRepository;
use App\Trait\HydrateTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClubSubscriptionRepository::class)]
class ClubSubscription
{
    use HydrateTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $subscriptionDate = null;

    #[ORM\Column]
    private ?bool $isContributionOk = null;

    #[ORM\ManyToOne(inversedBy: 'clubSubscriptions')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $userSubscriptor = null;

    #[ORM\ManyToOne(inversedBy: 'userSubscriptions')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Club $clubSubscripted = null;

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

    public function getUserSubscriptor(): ?User
    {
        return $this->userSubscriptor;
    }

    public function setUserSubscriptor(?User $userSubscriptor): static
    {
        $this->userSubscriptor = $userSubscriptor;

        return $this;
    }

    public function getClubSubscripted(): ?Club
    {
        return $this->clubSubscripted;
    }

    public function setClubSubscripted(?Club $clubSubscripted): static
    {
        $this->clubSubscripted = $clubSubscripted;

        return $this;
    }
}
