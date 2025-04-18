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
    private ?string $type = null;

    /**
     * @var Collection<int, Competitions>
     */
    #[ORM\OneToMany(targetEntity: Competitions::class, mappedBy: 'typecomp')]
    private Collection $compettype;

    public function __construct()
    {
        $this->compettype = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, Competitions>
     */
    public function getCompettype(): Collection
    {
        return $this->compettype;
    }

    public function addCompettype(Competitions $compettype): static
    {
        if (!$this->compettype->contains($compettype)) {
            $this->compettype->add($compettype);
            $compettype->setTypecomp($this);
        }

        return $this;
    }

    public function removeCompettype(Competitions $compettype): static
    {
        if ($this->compettype->removeElement($compettype)) {
            // set the owning side to null (unless already changed)
            if ($compettype->getTypecomp() === $this) {
                $compettype->setTypecomp(null);
            }
        }

        return $this;
    }
}
