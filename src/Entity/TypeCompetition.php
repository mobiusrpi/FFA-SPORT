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
    private Collection $linktype;

    public function __construct()
    {
        $this->linktype = new ArrayCollection();
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
    public function getLinktype(): Collection
    {
        return $this->linktype;
    }

    public function addLinktype(Competitions $linktype): static
    {
        if (!$this->linktype->contains($linktype)) {
            $this->linktype->add($linktype);
            $linktype->setTypecompetition($this);
        }

        return $this;
    }

    public function removeLinkType(Competitions $linktype): static
    {
        if ($this->linktype->removeElement($linktype)) {
            // set the owning side to null (unless already changed)
            if ($linktype->getTypecompetition() === $this) {
                $linktype->setTypecompetition(null);
            }
        }

        return $this;
    }
}
