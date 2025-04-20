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
    private Collection $relationtype;

    public function __construct()
    {
        $this->relationtype = new ArrayCollection();
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
    public function getRelationtype(): Collection
    {
        return $this->relationtype;
    }

    public function addRelationtype(Competitions $relationtype): static
    {
        if (!$this->relationtype->contains($relationtype)) {
            $this->relationtype->add($relationtype);
            $relationtype->setTypecompetition($this);
        }

        return $this;
    }

    public function removeRelationType(Competitions $relationtype): static
    {
        if ($this->relationtype->removeElement($relationtype)) {
            // set the owning side to null (unless already changed)
            if ($relationtype->getTypecompetition() === $this) {
                $relationtype->setTypecompetition(null);
            }
        }

        return $this;
    }
}
