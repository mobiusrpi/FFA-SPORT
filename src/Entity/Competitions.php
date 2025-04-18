<?php

namespace App\Entity;

use App\Repository\CompetitionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompetitionsRepository::class)]
class Competitions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $startDate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $endDate = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $startRegistration = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $endRegistration = null;

    #[ORM\Column(length: 50)]
    private ?string $location = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    /**
     * @var Collection<int, crew>
     */
    #[ORM\ManyToMany(targetEntity: crew::class, inversedBy: 'competition')]
    private Collection $crew;

    #[ORM\ManyToOne(inversedBy: 'compettype')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeCompetition $typecomp = null;

    public function __construct()
    {
        $this->crew = new ArrayCollection();
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

    public function getStartDate(): ?\DateTimeImmutable
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeImmutable $startDate): static
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeImmutable
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeImmutable $endDate): static
    {
        $this->endDate = $endDate;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getStartRegistration(): ?\DateTimeImmutable
    {
        return $this->startRegistration;
    }

    public function setStartRegistration(\DateTimeImmutable $startRegistration): static
    {
        $this->startRegistration = $startRegistration;

        return $this;
    }

    public function getEndRegistration(): ?\DateTimeImmutable
    {
        return $this->endRegistration;
    }

    public function setEndRegistration(\DateTimeImmutable $endRegistration): static
    {
        $this->endRegistration = $endRegistration;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection<int, crew>
     */
    public function getCrew(): Collection
    {
        return $this->crew;
    }

    public function addCrew(crew $crew): static
    {
        if (!$this->crew->contains($crew)) {
            $this->crew->add($crew);
        }

        return $this;
    }

    public function removeCrew(crew $crew): static
    {
        $this->crew->removeElement($crew);

        return $this;
    }

    public function getTypecomp(): ?TypeCompetition
    {
        return $this->typecomp;
    }

    public function setTypecomp(?TypeCompetition $typecomp): static
    {
        $this->typecomp = $typecomp;

        return $this;
    }
}
