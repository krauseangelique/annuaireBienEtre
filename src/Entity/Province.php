<?php

namespace App\Entity;

use App\Repository\ProvinceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: ProvinceRepository::class)]
#[Broadcast]
class Province
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $province = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProvince(): ?string
    {
        return $this->province;
    }

    public function setProvince(?string $province): static
    {
        $this->province = $province;

        return $this;
    }
}
