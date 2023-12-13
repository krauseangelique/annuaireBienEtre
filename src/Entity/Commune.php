<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: CommuneRepository::class)]
#[Broadcast]
class Commune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commune = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(?string $commune): static
    {
        $this->commune = $commune;

        return $this;
    }
}
