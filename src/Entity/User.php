<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;

use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;



#[DiscriminatorColumn(name: "discr", type: "string")]
#[DiscriminatorMap(["user" => "User", "internaute" => "Internaute", "prestataire" => "Prestataire"])]
#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\InheritanceType('JOINED')]
// #[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
#[UniqueEntity(fields: ['email'], message: 'Il existe déjà un compte qui utilise cet email . Vous êtes donc peut-être déjà inscrit ! ')]

// https://symfony.com/doc/current/security.html#the-user
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    protected ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    protected ?string $email = null;

    // [ORM\Column(type: 'json')]
    // protected array $roles = [];
    #[ORM\Column] 
    protected array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $password = null;

    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $adresseNum = null;

    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $adresseRue = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    protected ?\DateTimeInterface $inscription = null;

    #[ORM\Column(length: 255, nullable: true)]
    protected ?string $typeUtilisateur = null;

    #[ORM\Column(nullable: true)]
    protected ?int $nbEssaisInfructueux = null;

    #[ORM\Column(nullable: true)]
    protected ?bool $banni = null;

    #[ORM\Column(nullable: true)]
    protected ?bool $inscriptConfirmee = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    protected ?CodePostal $adresseCP = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    protected ?Province $adresseProvince = null;

    #[ORM\ManyToOne(inversedBy: 'users')]
    protected ?Commune $commune = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    // c'est un héritage pas une relation
    // #[ORM\OneToOne(mappedBy: 'utilisateur', cascade: ['persist', 'remove'])]
    // private ?Internaute $internaute = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
// https://symfony.com/doc/current/security.html self au lieu de static idem role
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     * The public representation of the user (e.g. a username, an email address, etc.)
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
// Le mot-clef self permet d'utiliser une méthode ou une propriété de la classe elle-même. Utiliser ces mots clefs évite simplement de répéter le nom de la classe dans ton code
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAdresseNum(): ?string
    {
        return $this->adresseNum;
    }

    public function setAdresseNum(?string $adresseNum): static
    {
        $this->adresseNum = $adresseNum;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresseRue;
    }

    public function setAdresseRue(?string $adresseRue): static
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    public function getInscription(): ?\DateTimeInterface
    {
        return $this->inscription;
    }

    public function setInscription(?\DateTimeInterface $inscription): static
    {
        $this->inscription = $inscription;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->typeUtilisateur;
    }

    public function setTypeUtilisateur(?string $typeUtilisateur): static
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    public function getNbEssaisInfructueux(): ?int
    {
        return $this->nbEssaisInfructueux;
    }

    public function setNbEssaisInfructueux(?int $nbEssaisInfructueux): static
    {
        $this->nbEssaisInfructueux = $nbEssaisInfructueux;

        return $this;
    }

    public function isBanni(): ?bool
    {
        return $this->banni;
    }

    public function setBanni(?bool $banni): static
    {
        $this->banni = $banni;

        return $this;
    }

    public function isInscriptConfirmee(): ?bool
    {
        return $this->inscriptConfirmee;
    }

    public function setInscriptConfirmee(?bool $inscriptConfirmee): static
    {
        $this->inscriptConfirmee = $inscriptConfirmee;

        return $this;
    }

    public function getAdresseCP(): ?CodePostal
    {
        return $this->adresseCP;
    }

    public function setAdresseCP(?CodePostal $adresseCP): static
    {
        $this->adresseCP = $adresseCP;

        return $this;
    }

    public function getAdresseProvince(): ?Province
    {
        return $this->adresseProvince;
    }

    public function setAdresseProvince(?Province $adresseProvince): static
    {
        $this->adresseProvince = $adresseProvince;

        return $this;
    }

    public function getCommune(): ?Commune
    {
        return $this->commune;
    }

    public function setCommune(?Commune $commune): static
    {
        $this->commune = $commune;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): static
    {
        $this->isVerified = $isVerified;

        return $this;
    }
    
    // Méthode pour convertir l'OBJET en chaîne de caractères
    public function __toString(){
        return "User CP: " . $this->adresseCP . ", Commune: " . $this->commune . ", Province: " . $this->adresseProvince;
    }
}

