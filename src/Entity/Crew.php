<?php

namespace App\Entity;

use App\Entity\Enum\Category;
use App\Entity\Enum\SpeedList;
use App\Repository\CrewRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CrewRepository::class)]
class Crew
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Competitors>
     */
    #[ORM\ManyToMany(targetEntity: Competitors::class, inversedBy: 'crewPilot')]
    private Collection $pilote;

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

    /**
     * @var Collection<int, Competitions>
     */
    #[ORM\ManyToMany(targetEntity: Competitions::class, mappedBy: 'crew')]
    private Collection $competition;

    public function __construct()
    {
        $this->pilote = new ArrayCollection();
        $this->competition = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Competitors>
     */
    public function getPilote(): Collection
    {
        return $this->pilote;
    }

    public function addPilote(Competitors $pilote): static
    {
        if (!$this->pilote->contains($pilote)) {
            $this->pilote->add($pilote);
        }

        return $this;
    }

    public function removePilote(Competitors $pilote): static
    {
        $this->pilote->removeElement($pilote);

        return $this;
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

    /**
     * @return Collection<int, Competitions>
     */
    public function getCompetition(): Collection
    {
        return $this->competition;
    }

    public function addCompetition(Competitions $competition): static
    {
        if (!$this->competition->contains($competition)) {
            $this->competition->add($competition);
            $competition->addCrew($this);
        }

        return $this;
    }

    public function removeCompetition(Competitions $competition): static
    {
        if ($this->competition->removeElement($competition)) {
            $competition->removeCrew($this);
        }

        return $this;
    }


}

