<?php

namespace App\Entity;

use App\Entity\Enum\Category;
use App\Entity\Enum\SpeedList;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CrewsRepository;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: CrewsRepository::class)]
#[UniqueEntity('pilot')]
#[UniqueEntity('navigator')]
class Crews
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(enumType: Category::class, nullable: true)]
    #[Assert\NotBlank()]
    private ?Category $category = null;

    #[ORM\Column(length: 8, nullable: true)]    
//    #[Assert\NotBlank()]
    private ?string $callsign = null;

    #[ORM\Column(enumType: SpeedList::class, nullable: true)]
    #[Assert\NotBlank()]
    private ?SpeedList $aircraftSpeed = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $aircraftType = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $aircraftFlyingclub = null;

    #[ORM\Column(nullable: true)]
    private ?bool $aircraftSharing = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $pilotShared = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $payment = null;

    #[ORM\ManyToOne(inversedBy: 'linkcrew')]    
    #[Assert\NotBlank()]
    private ?Competitions $competition = null;

    #[ORM\ManyToOne(inversedBy: 'linkpilot')]    
    #[Assert\NotBlank()]
    private ?Competitors $pilot = null;

    #[ORM\ManyToOne(inversedBy: 'linknavigator')]
    private ?Competitors $navigator = null;

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

    public function getPilot(): ?Competitors
    {
        return $this->pilot;
    }

    public function setPilot(?Competitors $pilot): static
    {
        $this->pilot = $pilot;

        return $this;
    }

    public function getNavigator(): ?Competitors
    {
        return $this->navigator;
    }

    public function setNavigator(?Competitors $navigator): static
    {
        $this->navigator = $navigator;

        return $this;
    }  
    
    public function __toString(): string
    {
       return 'test';
    }
}

