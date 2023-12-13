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
    private ?int $ordre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): static
    {
        $this->ordre = $ordre;

        return $this;
    }
}
