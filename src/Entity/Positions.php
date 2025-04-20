<?php

namespace App\Entity;

use App\Repository\PositionsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PositionsRepository::class)]
class Positions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $crewRole = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCrewRole(): ?string
    {
        return $this->crewRole;
    }

    public function setCrewRole(string $crewRole): static
    {
        $this->crewRole = $crewRole;

        return $this;
    }
}
