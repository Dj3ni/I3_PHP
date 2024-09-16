<?php

namespace App\Entity;

use App\Repository\ClubRepository;
use App\Trait\HydrateTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Enum\GameType;

#[ORM\Entity(repositoryClass: ClubRepository::class)]
class Club
{
    use HydrateTrait;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column (type: "string", enumType: GameType::class)]
    private GameType $gameType;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    /**
     * @var Collection<int, ClubSubscription>
     */
    #[ORM\OneToMany(targetEntity: ClubSubscription::class, mappedBy: 'clubSubscripted', orphanRemoval: true)]
    private Collection $userSubscriptions;

    #[ORM\OneToOne(inversedBy: 'clubAddress', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private ?address $address = null;

    /**
     * @var Collection<int, ClubGameLibrary>
     */
    #[ORM\OneToMany(targetEntity: ClubGameLibrary::class, mappedBy: 'club', orphanRemoval: true)]
    private Collection $gameLibraries;

    public function __construct(array $init = [])
    {
        $this->hydrate($init);
        $this->userSubscriptions = new ArrayCollection();
        $this->gameLibraries = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, ClubSubscription>
     */
    public function getUserSubscriptions(): Collection
    {
        return $this->userSubscriptions;
    }

    public function addUserSubscription(ClubSubscription $userSubscription): static
    {
        if (!$this->userSubscriptions->contains($userSubscription)) {
            $this->userSubscriptions->add($userSubscription);
            $userSubscription->setClubSubscripted($this);
        }

        return $this;
    }

    public function removeUserSubscription(ClubSubscription $userSubscription): static
    {
        if ($this->userSubscriptions->removeElement($userSubscription)) {
            // set the owning side to null (unless already changed)
            if ($userSubscription->getClubSubscripted() === $this) {
                $userSubscription->setClubSubscripted(null);
            }
        }

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

    /**
     * @return Collection<int, ClubGameLibrary>
     */
    public function getGameLibraries(): Collection
    {
        return $this->gameLibraries;
    }

    public function addGameLibrary(ClubGameLibrary $gameLibrary): static
    {
        if (!$this->gameLibraries->contains($gameLibrary)) {
            $this->gameLibraries->add($gameLibrary);
            $gameLibrary->setClub($this);
        }

        return $this;
    }

    public function removeGameLibrary(ClubGameLibrary $gameLibrary): static
    {
        if ($this->gameLibraries->removeElement($gameLibrary)) {
            // set the owning side to null (unless already changed)
            if ($gameLibrary->getClub() === $this) {
                $gameLibrary->setClub(null);
            }
        }

        return $this;
    }

    /**
     * Get the value of gameType
     */
    public function getGameType(): GameType
    {
        return $this->gameType;
    }

    /**
     * Set the value of gameType
     */
    public function setGameType(GameType $gameType): self
    {
        $this->gameType = $gameType;

        return $this;
    }
}
