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

    #[ORM\Column(length: 255)]
    private ?string $Title = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $DateStart = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEnd = null;

    #[ORM\Column(nullable: true)]
    private ?int $dateOccurency = null;

    #[ORM\Column(length: 150, nullable: true)]
    private ?string $Type = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2, nullable: true)]
    private ?string $Fee = null;

    /**
     * @var Collection<int, Place>
     */
    #[ORM\OneToMany(targetEntity: Place::class, mappedBy: 'event')]
    private Collection $eventAddress;

    public function __construct()
    {
        $this->eventAddress = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): static
    {
        $this->Title = $Title;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->DateStart;
    }

    public function setDateStart(\DateTimeInterface $DateStart): static
    {
        $this->DateStart = $DateStart;

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
        return $this->Type;
    }

    public function setType(?string $Type): static
    {
        $this->Type = $Type;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getFee(): ?string
    {
        return $this->Fee;
    }

    public function setFee(?string $Fee): static
    {
        $this->Fee = $Fee;

        return $this;
    }

    /**
     * @return Collection<int, Place>
     */
    public function getEventAddress(): Collection
    {
        return $this->eventAddress;
    }

    public function addEventAddress(Place $eventAddress): static
    {
        if (!$this->eventAddress->contains($eventAddress)) {
            $this->eventAddress->add($eventAddress);
            $eventAddress->setEvent($this);
        }

        return $this;
    }

    public function removeEventAddress(Place $eventAddress): static
    {
        if ($this->eventAddress->removeElement($eventAddress)) {
            // set the owning side to null (unless already changed)
            if ($eventAddress->getEvent() === $this) {
                $eventAddress->setEvent(null);
            }
        }

        return $this;
    }
}
