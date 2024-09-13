<?php

namespace App\Entity;

use App\Repository\EventSubscriptionRepository;
use App\Trait\HydrateTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventSubscriptionRepository::class)]
class EventSubscription
{
    use HydrateTrait;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateSubscription = null;

    #[ORM\ManyToOne(inversedBy: 'eventSubscriptions')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $userSubscriptor = null;

    #[ORM\ManyToOne(inversedBy: 'subscriptions')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Event $eventSubscripted = null;

    public function __construct(array $init = [])
    {
        $this->hydrate($init);
    }

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
