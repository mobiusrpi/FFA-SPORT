<?php

namespace App\Entity;

use App\Entity\Enum\Category;
use App\Entity\Enum\SpeedList;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CrewsRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\Entity(repositoryClass: CrewsRepository::class)]
class Crews
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(enumType: Category::class)]
    private ?Category $category = null;

    #[ORM\Column(length: 8)]
    private ?string $callsign = null;

    #[ORM\Column(enumType: SpeedList::class)]
    private ?SpeedList $aircraftSpeed = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $aircraftType = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $aircraftFlyingclub = null;

    #[ORM\Column]
    private ?bool $aircraftSharing = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $pilotShared = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $payment = null;

    #[ORM\ManyToOne(inversedBy: 'relationcrew')]
    private ?Competitions $competition = null;

     /**
     * @var Collection<int, Competitors>
     */
    #[ORM\OneToMany(targetEntity: Competitors::class, mappedBy: 'crew')]
    private Collection $competitor;

    public function __construct()
    {
        $this->competitor = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(Category $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getCallsign(): ?string
    {
        return $this->callsign;
    }

    public function setCallsign(string $callsign): static
    {
        $this->callsign = $callsign;

        return $this;
    }

    public function getAircraftSpeed(): ?SpeedList
    {
        return $this->aircraftSpeed;
    }

    public function setAircraftSpeed(SpeedList $aircraftSpeed): static
    {
        $this->aircraftSpeed = $aircraftSpeed;

        return $this;
    }

    public function getAircraftType(): ?string
    {
        return $this->aircraftType;
    }

    public function setAircraftType(?string $aircraftType): static
    {
        $this->aircraftType = $aircraftType;

        return $this;
    }

    public function getAircraftFlyingclub(): ?string
    {
        return $this->aircraftFlyingclub;
    }

    public function setAircraftFlyingclub(?string $aircraftFlyingclub): static
    {
        $this->aircraftFlyingclub = $aircraftFlyingclub;

        return $this;
    }

    public function isAircraftSharing(): ?bool
    {
        return $this->aircraftSharing;
    }

    public function setAircraftSharing(bool $aircraftSharing): static
    {
        $this->aircraftSharing = $aircraftSharing;

        return $this;
    }

    public function getPilotShared(): ?string
    {
        return $this->pilotShared;
    }

    public function setPilotShared(?string $pilotShared): static
    {
        $this->pilotShared = $pilotShared;

        return $this;
    }

    public function getPayment(): ?string
    {
        return $this->payment;
    }

    public function setPayment(?string $payment): static
    {
        $this->payment = $payment;

        return $this;
    }

    public function getCompetition(): ?Competitions
    {
        return $this->competition;
    }

    public function setCompetition(?Competitions $competition): static
    {
        $this->competition = $competition;

        return $this;
    }

     /**
     * @return Collection<int, Competitors>
     */
    public function getCompetitor(): Collection
    {
        return $this->competitor;
    }

    public function addCompetitor(Competitors $competitor): static
    {
        if (!$this->competitor->contains($competitor)) {
            $this->competitor->add($competitor);
            $competitor->setCrew($this);
        }

        return $this;
    }

    public function removeCompetitor(Competitors $competitor): static
    {
        if ($this->competitor->removeElement($competitor)) {
            // set the owning side to null (unless already changed)
            if ($competitor->getCrew() === $this) {
                $competitor->setCrew(null);
            }
        }

        return $this;
    }
}

