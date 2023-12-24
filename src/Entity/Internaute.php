<?php

namespace App\Entity;

use App\Repository\InternauteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: InternauteRepository::class)]
#[Broadcast]
class Internaute extends User
{
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(nullable: true)]
    private ?bool $newsletter = null;

    #[ORM\OneToMany(mappedBy: 'internaute', targetEntity: Abus::class)]
    private Collection $abus;

    #[ORM\OneToMany(mappedBy: 'internaute', targetEntity: Commentaire::class)]
    private Collection $commentaire;

    #[ORM\OneToOne(inversedBy: 'internaute', cascade: ['persist', 'remove'])]
    private ?Image $image = null;



    #[ORM\ManyToMany(targetEntity: Prestataire::class, mappedBy: 'internaute')]
    private Collection $prestataires;

    #[ORM\OneToMany(mappedBy: 'internaute', targetEntity: Position::class)]
    private Collection $position;

    #[ORM\ManyToMany(targetEntity: Prestataire::class, inversedBy: 'internautesFavoris')]
    private Collection $prestatairesFavoris;


    public function __construct()
    {
        $this->abus = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        $this->prestataires = new ArrayCollection();
        $this->position = new ArrayCollection();
        $this->prestatairesFavoris = new ArrayCollection();
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function isNewsletter(): ?bool
    {
        return $this->newsletter;
    }

    public function setNewsletter(?bool $newsletter): static
    {
        $this->newsletter = $newsletter;

        return $this;
    }

    /**
     * @return Collection<int, Abus>
     */
    public function getAbus(): Collection
    {
        return $this->abus;
    }

    public function addAbu(Abus $abu): static
    {
        if (!$this->abus->contains($abu)) {
            $this->abus->add($abu);
            $abu->setInternaute($this);
        }

        return $this;
    }

    public function removeAbu(Abus $abu): static
    {
        if ($this->abus->removeElement($abu)) {
            // set the owning side to null (unless already changed)
            if ($abu->getInternaute() === $this) {
                $abu->setInternaute(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): static
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire->add($commentaire);
            $commentaire->setInternaute($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): static
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getInternaute() === $this) {
                $commentaire->setInternaute(null);
            }
        }

        return $this;
    }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): static
    {
        $this->image = $image;

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
            $position->setInternaute($this);
        }

        return $this;
    }

    public function removePosition(Position $position): static
    {
        if ($this->position->removeElement($position)) {
            // set the owning side to null (unless already changed)
            if ($position->getInternaute() === $this) {
                $position->setInternaute(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Prestataire>
     */
    public function getPrestatairesFavoris(): Collection
    {
        return $this->prestatairesFavoris;
    }

    public function addPrestatairesFavori(Prestataire $prestatairesFavori): static
    {
        if (!$this->prestatairesFavoris->contains($prestatairesFavori)) {
            $this->prestatairesFavoris->add($prestatairesFavori);
        }

        return $this;
    }

    public function removePrestatairesFavori(Prestataire $prestatairesFavori): static
    {
        $this->prestatairesFavoris->removeElement($prestatairesFavori);

        return $this;
    }
}
