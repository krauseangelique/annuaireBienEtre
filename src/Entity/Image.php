<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ImageRepository::class)]

class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $ordre = null;

    // le chemin de mon image est en string et c'est représenté par $image
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $image = null;

    #[ORM\OneToOne(mappedBy: 'image', cascade: ['persist', 'remove'])]
    private ?CategorieServices $categorieServices = null; // Photo de la Categorie de Services

    #[ORM\OneToOne(mappedBy: 'image', cascade: ['persist', 'remove'])]
    private ?Internaute $internaute = null; // Avatar

    #[ORM\ManyToOne(inversedBy: 'logo')]
    private ?Prestataire $prestataire = null; // logo Prestataire

    #[ORM\ManyToOne(inversedBy: 'photo')]
    private ?Prestataire $prestatairePhoto = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    private ?Prestataire $photoPrestataire = null;

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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getCategorieServices(): ?CategorieServices
    {
        return $this->categorieServices;
    }

    public function setCategorieServices(?CategorieServices $categorieServices): static
    {
        // unset the owning side of the relation if necessary
        if ($categorieServices === null && $this->categorieServices !== null) {
            $this->categorieServices->setImage(null);
        }

        // set the owning side of the relation if necessary
        if ($categorieServices !== null && $categorieServices->getImage() !== $this) {
            $categorieServices->setImage($this);
        }

        $this->categorieServices = $categorieServices;

        return $this;
    }

    public function getInternaute(): ?Internaute
    {
        return $this->internaute;
    }

    public function setInternaute(?Internaute $internaute): static
    {
        // unset the owning side of the relation if necessary
        if ($internaute === null && $this->internaute !== null) {
            $this->internaute->setImage(null);
        }

        // set the owning side of the relation if necessary
        if ($internaute !== null && $internaute->getImage() !== $this) {
            $internaute->setImage($this);
        }

        $this->internaute = $internaute;

        return $this;
    }

    public function getPrestataire(): ?Prestataire
    {
        return $this->prestataire;
    }

    public function setPrestataire(?Prestataire $prestataire): static
    {
        $this->prestataire = $prestataire;

        return $this;
    }

    public function getPrestatairePhoto(): ?Prestataire
    {
        return $this->prestatairePhoto;
    }

    public function setPrestatairePhoto(?Prestataire $prestatairePhoto): static
    {
        $this->prestatairePhoto = $prestatairePhoto;

        return $this;
    }

    public function getPhotoPrestataire(): ?Prestataire
    {
        return $this->photoPrestataire;
    }

    public function setPhotoPrestataire(?Prestataire $photoPrestataire): static
    {
        $this->photoPrestataire = $photoPrestataire;

        return $this;
    }
    public function __toString()
    {
        return $this->image;
    }
}
