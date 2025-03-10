<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

#[ORM\Entity(repositoryClass: CommuneRepository::class)]

class Commune extends EntityRepository
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commune = null;

    #[ORM\OneToMany(mappedBy: 'commune', targetEntity: User::class)]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

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

            $user->setCommune($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getCommune() === $this) {
                $user->setCommune(null);
            }
        }

        return $this;
    }

    // ajout de la méthode __toString() pour permettre de transformer un objet en string
    public function __toString()
    {
        return $this->getCommune();
    }

    // !!! Depuis les repositories, vous avez également la possibilité d'utiliser la méthode getEntityName() pour récupérer la classe de l'entité du repository courant (objectif n'avoir qu'une fois chaque commune):
    public function getAll()
    {
        return $this->getEntityManager()
            ->createQuery(
                `SELECT DISTINCT commune
                FROM Commune 
                ORDER BY commune ASC`
            )


            ->getResult()
        ;
    }
}
