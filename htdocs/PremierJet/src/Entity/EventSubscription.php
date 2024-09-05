<?php

namespace App\Entity;

use App\Repository\EventSubscriptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventSubscriptionRepository::class)]
class EventSubscription
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateSubscription = null;

    #[ORM\ManyToOne(inversedBy: 'eventSubscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userSubscriptor = null;

    #[ORM\ManyToOne(inversedBy: 'subscriptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Event $eventSubscripted = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateSubscription(): ?\DateTimeImmutable
    {
        return $this->dateSubscription;
    }

    public function setDateSubscription(\DateTimeImmutable $dateSubscription): static
    {
        $this->dateSubscription = $dateSubscription;

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

    public function getEventSubscripted(): ?Event
    {
        return $this->eventSubscripted;
    }

    public function setEventSubscripted(?Event $eventSubscripted): static
    {
        $this->eventSubscripted = $eventSubscripted;

        return $this;
    }
}
