<?php

namespace App\Entity;

use App\Repository\BlocRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: BlocRepository::class)]

class Bloc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'blocPosition', targetEntity: Position::class)]
    private Collection $position;

    public function __construct()
    {
        $this->position = new ArrayCollection();
    }






    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Position>
     */
    public function getPosition(): Collection
    {
        return $this->position;
    }

    public function addPosition(Position $position): static
    {
        if (!$this->position->contains($position)) {
            $this->position->add($position);
            $position->setBlocPosition($this);
        }

        return $this;
    }

    public function removePosition(Position $position): static
    {
        if ($this->position->removeElement($position)) {
            // set the owning side to null (unless already changed)
            if ($position->getBlocPosition() === $this) {
                $position->setBlocPosition(null);
            }
        }

        return $this;
    }
}
