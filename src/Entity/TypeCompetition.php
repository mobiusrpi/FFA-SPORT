<?php

namespace App\Entity;

use App\Repository\TypeCompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TypeCompetitionRepository::class)]
class TypeCompetition
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $typecomp = null;

    /**
     * @var Collection<int, Competitions>
     */
    #[ORM\OneToMany(targetEntity: Competitions::class, mappedBy: 'typecompetition')]
    private Collection $relationType;

    public function __construct()
    {
        $this->relationType = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypecomp(): ?string
    {
        return $this->typecomp;
    }

    public function setTypecomp(string $typecomp): static
    {
        $this->typecomp = $typecomp;

        return $this;
    }

    /**
     * @return Collection<int, Competitions>
     */
    public function getRelationType(): Collection
    {
        return $this->relationType;
    }

    public function addRelationType(Competitions $relationType): static
    {
        if (!$this->relationType->contains($relationType)) {
            $this->relationType->add($relationType);
            $relationType->setTypecompetition($this);
        }

        return $this;
    }

    public function removeRelationType(Competitions $relationType): static
    {
        if ($this->relationType->removeElement($relationType)) {
            // set the owning side to null (unless already changed)
            if ($relationType->getTypecompetition() === $this) {
                $relationType->setTypecompetition(null);
            }
        }

        return $this;
    }
}
