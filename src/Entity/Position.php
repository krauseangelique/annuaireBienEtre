<?php
// src\Entity\Position.php
namespace App\Entity;

use App\Repository\PositionRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: PositionRepository::class)]

class Position
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $Ordre = null;



    #[ORM\ManyToOne(inversedBy: 'position')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'position')]
    private ?Bloc $blocPosition = null; // Attention: relation Internaute-position-bloc fausse dans le schéma de BD ! 
                                        // La relation correcte est Internaute -1----*-Position-*-----1-Bloc

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

    



    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getBlocPosition(): ?Bloc
    {
        return $this->blocPosition;
    }

    public function setBlocPosition(?Bloc $blocPosition): static
    {
        $this->blocPosition = $blocPosition;

        return $this;
    }
}
