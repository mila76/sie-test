<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Deprecated;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_USERNAME', fields: ['username'])]
class User implements PasswordAuthenticatedUserInterface, UserInterface
{
  #[ORM\Id]
  #[ORM\GeneratedValue]
  #[ORM\Column]
  private ?int $id = null;

  #[ORM\Column(length: 32, unique: true)]
  private ?string $username = null;

  #[ORM\Column]
  private array $roles = [];

  /**
   * @var string The hashed password
   */
  #[ORM\Column]
  private ?string $password = null;

  #[ORM\Column(length: 150, nullable: true)]
  private ?string $email = null;

  #[ORM\Column]
  private ?bool $disabled = null;

  #[ORM\Column(length: 150)]
  private ?string $nomecognome = null;

  #[ORM\Column(nullable: true)]
  private ?int $esolver_idcli = null;

  #[ORM\Column(nullable: true)]
  private ?int $codclifor = null;

  private ?string $ragionesociale = '';

  public function getId(): ?int
  {
    return $this->id;
  }

  public function getUsername(): ?string
  {
    return $this->username;
  }

  public function setUsername(string $username): static
  {
    $this->username = $username;

    return $this;
  }

  /**
   * A visual identifier that represents this user.
   *
   * @see UserInterface
   */
  public function getUserIdentifier(): string
  {
    return (string) $this->username;
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

  public function setRoles(array $roles): static
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

  public function getEmail(): ?string
  {
    return $this->email;
  }

  public function setEmail(?string $email): static
  {
    $this->email = $email;

    return $this;
  }

  public function isDisabled(): ?bool
  {
    return $this->disabled;
  }

  public function setDisabled(bool $disabled): static
  {
    $this->disabled = $disabled;

    return $this;
  }

  public function getNomecognome(): ?string
  {
    return $this->nomecognome;
  }

  public function setNomecognome(string $nomecognome): static
  {
    $this->nomecognome = $nomecognome;

    return $this;
  }

  public function getEsolverIdcli(): ?int
  {
    return $this->esolver_idcli;
  }

  public function setEsolverIdcli(?int $esolver_idcli): static
  {
    $this->esolver_idcli = $esolver_idcli;

    return $this;
  }

  public function getCodclifor(): ?int
  {
    return $this->codclifor;
  }

  public function setCodclifor(?int $codclifor): static
  {
    $this->codclifor = $codclifor;

    return $this;
  }

  public function getRagionesociale(): ?string
  {
    return $this->ragionesociale;
  }

  public function setRagionesociale(string $ragionesociale): static
  {
    $this->ragionesociale = $ragionesociale;

    return $this;
  }

  #[Deprecated]
  public function eraseCredentials(): void
  {
    // @deprecated, to be removed when upgrading to Symfony 8
  }
}
