<?php

namespace App\Entity;

use App\Repository\CodePostalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'adresseCP', targetEntity: User::class)]
    private Collection $users;

    #[ORM\OneToMany(mappedBy: 'codePostal', targetEntity: Commune::class)]
    private Collection $commune;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->commune = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): static
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setAdresseCP($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getAdresseCP() === $this) {
                $user->setAdresseCP(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commune>
     */
    public function getCommune(): Collection
    {
        return $this->commune;
    }

    public function addCommune(Commune $commune): static
    {
        if (!$this->commune->contains($commune)) {
            $this->commune->add($commune);
            $commune->setCodePostal($this);
        }

        return $this;
    }

    public function removeCommune(Commune $commune): static
    {
        if ($this->commune->removeElement($commune)) {
            // set the owning side to null (unless already changed)
            if ($commune->getCodePostal() === $this) {
                $commune->setCodePostal(null);
            }
        }

        return $this;
    }
}
