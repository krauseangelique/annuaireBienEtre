<?php

namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: PositionRepository::class)]
#[Broadcast]
class Position
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $Ordre = null;

    #[ORM\OneToOne(inversedBy: 'position', cascade: ['persist', 'remove'])]
    private ?Internaute $internauteId = null;

    #[ORM\OneToOne(inversedBy: 'positionBloc', cascade: ['persist', 'remove'])]
    private ?Bloc $blocId = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdre(): ?int
    {
        return $this->Ordre;
    }

    public function setOrdre(?int $Ordre): static
    {
        $this->Ordre = $Ordre;

        return $this;
    }

    public function getInternauteId(): ?Internaute
    {
        return $this->internauteId;
    }

    public function setInternauteId(?Internaute $internauteId): static
    {
        $this->internauteId = $internauteId;

        return $this;
    }

    public function getBlocId(): ?Bloc
    {
        return $this->blocId;
    }

    public function setBlocId(?Bloc $blocId): static
    {
        $this->blocId = $blocId;

        return $this;
    }
}
