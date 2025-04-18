<?php

namespace App\Entity;

use App\Entity\Enum\CRAList;
use App\Entity\Enum\Gender;
use App\Entity\Enum\Polosize;
use App\Repository\CompetitorsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitorsRepository::class)]
class Competitors
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $lastname = null;

    #[ORM\Column(length: 30)]
    private ?string $firstname = null;

    #[ORM\Column(length: 15, unique: true)]
    private ?string $ffaLicence = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $dateBirth = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $flyingclub = null;

    #[ORM\Column(length: 128)]
    private ?string $email = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $phone = null;

    #[ORM\Column(nullable: true, enumType: Gender::class)]
    private ?Gender $gender = null;

    #[ORM\Column(enumType: CRAList::class)]
    private ?CRAList $committee = null;

    #[ORM\Column(nullable: true, enumType: Polosize::class)]
    private ?Polosize $poloSize = null;

    /**
     * @var Collection<int, Crew>
     */
    #[ORM\ManyToMany(targetEntity: Crew::class, mappedBy: 'pilote')]
    private Collection $crewPilot;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Position $position = null;

    public function __construct()
    {
        $this->crewPilot = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLasrname(string $lastname): static
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getFfaLicence(): ?string
    {
        return $this->ffaLicence;
    }

    public function setFfaLicence(string $ffaLicence): static
    {
        $this->ffaLicence = $ffaLicence;

        return $this;
    }

    public function getDateBirth(): ?\DateTimeImmutable
    {
        return $this->dateBirth;
    }

    public function setDateBirth(\DateTimeImmutable $dateBirth): static
    {
        $this->dateBirth = $dateBirth;

        return $this;
    }

    public function getFlyingclub(): ?string
    {
        return $this->flyingclub;
    }

    public function setFlyingclub(?string $flyingclub): static
    {
        $this->flyingclub = $flyingclub;

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

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): static
    {
        $this->gender = $gender;

        return $this;
    }

    public function getCommittee(): ?CRAList
    {
        return $this->committee;
    }

    public function setCommittee(CRAList $committee): static
    {
        $this->committee = $committee;

        return $this;
    }

    public function getPoloSize(): ?Polosize
    {
        return $this->poloSize;
    }

    public function setPoloSize(?Polosize $poloSize): static
    {
        $this->poloSize = $poloSize;

        return $this;
    }

    /**
     * @return Collection<int, CrewPilot>
     */
    public function getCrewPilot(): Collection
    {
        return $this->crewPilot;
    }

    public function addCrewPilot(Crew $crewPilot): static
    {
        if (!$this->crewPilot->contains($crewPilot)) {
            $this->crewPilot->add($crewPilot);
            $crewPilot->addPilote($this);
        }

        return $this;
    }

    public function removeCrewPilot(Crew $crewPilot): static
    {
        if ($this->crewPilot->removeElement($crewPilot)) {
            $crewPilot->removePilote($this);
        }

        return $this;
    }

    public function getPosition(): ?Position
    {
        return $this->position;
    }

    public function setPosition(?Position $position): static
    {
        $this->position = $position;

        return $this;
    }
}
