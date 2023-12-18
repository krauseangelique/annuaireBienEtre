<?php

namespace App\Entity;

use App\Repository\InternauteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\UX\Turbo\Attribute\Broadcast;

#[ORM\Entity(repositoryClass: InternauteRepository::class)]
#[Broadcast]
class Internaute
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

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

    #[ORM\ManyToMany(targetEntity: Bloc::class, inversedBy: 'internautes')]
    private Collection $bloc;

    #[ORM\OneToOne(inversedBy: 'internaute', cascade: ['persist', 'remove'])]
    private ?User $utilisateur = null;

    public function __construct()
    {
        $this->abus = new ArrayCollection();
        $this->commentaire = new ArrayCollection();
        $this->bloc = new ArrayCollection();
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
     * @return Collection<int, Bloc>
     */
    public function getBloc(): Collection
    {
        return $this->bloc;
    }

    public function addBloc(Bloc $bloc): static
    {
        if (!$this->bloc->contains($bloc)) {
            $this->bloc->add($bloc);
        }

        return $this;
    }

    public function removeBloc(Bloc $bloc): static
    {
        $this->bloc->removeElement($bloc);

        return $this;
    }

    public function getUtilisateur(): ?User
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?User $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
