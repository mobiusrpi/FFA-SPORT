<?php

namespace App\Entity;

use App\Repository\TrackersRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[UniqueEntity(fields: ['name'], message: 'Le tracker doit être unique')]
#[UniqueEntity(fields: ['imei'], message: 'L\'IMEI doit être unique')]
#[ORM\Entity(repositoryClass: TrackersRepository::class)]
class Trackers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 10)]    
    #[Assert\NotBlank()]   
    #[Assert\Length(max : 10)]  
    private ?string $name = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank()]   
    #[Assert\Length(max : 20)] 
    #[Assert\Regex('/^[0-9]')]
    private ?string $imei = null;

    #[ORM\Column(length: 8, nullable: true)]
    #[Assert\Length(max : 8)]
    private ?string $immat = null;   

    #[ORM\Column(length: 30, nullable: true)]
    #[Assert\Length(max : 30)]
    private ?string $crew = null;

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

    public function getImei(): ?string
    {
        return $this->imei;
    }

    public function setImei(string $imei): static
    {
        $this->imei = $imei;

        return $this;
    }

    public function getImmat(): ?string
    {
        return $this->immat;
    }

    public function setImmat(?string $immat): static
    {
        $this->immat = $immat;

        return $this;
    }

    public function getCrew(): ?string
    {
        return $this->crew;
    }

    public function setCrew(?string $crew): static
    {
        $this->crew = $crew;

        return $this;
    }
}
