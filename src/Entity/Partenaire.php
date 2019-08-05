<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PartenaireRepository")
 */
class Partenaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $matricule;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomPartenaire;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ninea;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $emailPartenaire;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adressePartenaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephonePartenaire;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\User", mappedBy="Partenaire")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ComptePartenaire", mappedBy="Partenaire")
     */
    private $comptePartenaires;

    public function __construct()
    {
        $this->users = new ArrayCollection();
        $this->comptePartenaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getNomPartenaire(): ?string
    {
        return $this->nomPartenaire;
    }

    public function setNomPartenaire(string $nomPartenaire): self
    {
        $this->nomPartenaire = $nomPartenaire;

        return $this;
    }

    public function getNinea(): ?string
    {
        return $this->ninea;
    }

    public function setNinea(string $ninea): self
    {
        $this->ninea = $ninea;

        return $this;
    }

    public function getEmailPartenaire(): ?string
    {
        return $this->emailPartenaire;
    }

    public function setEmailPartenaire(string $emailPartenaire): self
    {
        $this->emailPartenaire = $emailPartenaire;

        return $this;
    }

    public function getAdressePartenaire(): ?string
    {
        return $this->adressePartenaire;
    }

    public function setAdressePartenaire(string $adressePartenaire): self
    {
        $this->adressePartenaire = $adressePartenaire;

        return $this;
    }

    public function getTelephonePartenaire(): ?int
    {
        return $this->telephonePartenaire;
    }

    public function setTelephonePartenaire(int $telephonePartenaire): self
    {
        $this->telephonePartenaire = $telephonePartenaire;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setPartenaire($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            if ($user->getPartenaire() === $this) {
                $user->setPartenaire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|ComptePartenaire[]
     */
    public function getComptePartenaires(): Collection
    {
        return $this->comptePartenaires;
    }

    public function addComptePartenaire(ComptePartenaire $comptePartenaire): self
    {
        if (!$this->comptePartenaires->contains($comptePartenaire)) {
            $this->comptePartenaires[] = $comptePartenaire;
            $comptePartenaire->setPartenaire($this);
        }

        return $this;
    }

    public function removeComptePartenaire(ComptePartenaire $comptePartenaire): self
    {
        if ($this->comptePartenaires->contains($comptePartenaire)) {
            $this->comptePartenaires->removeElement($comptePartenaire);
            if ($comptePartenaire->getPartenaire() === $this) {
                $comptePartenaire->setPartenaire(null);
            }
        }

        return $this;
    }
}
