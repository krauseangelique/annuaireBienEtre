<?php

namespace App\Entity;

use App\Repository\CodePostalRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: CodePostalRepository::class)]
#[Broadcast]
class CodePostal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 15, nullable: true)]
    private ?string $codePostal = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): static
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}
