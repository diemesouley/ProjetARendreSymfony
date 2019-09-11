<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\ClientRepository")
 */
class Client
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
    private $nomEnvoyeur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenomEnvoyeur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $telephoneEnvoyeur;

    /**
     * @ORM\Column(type="bigint", nullable=false)
     */
    private $nCI;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nomRecepteur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenomRecepteur;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephoneRecepteur;

    /**
     * @ORM\Column(type="bigint", nullable=true)
     */
    private $nCIRecepteur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Transaction", mappedBy="clients")
     */
    private $transactions;

    public function __construct()
    {
        $this->transactions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEnvoyeur(): ?string
    {
        return $this->nomEnvoyeur;
    }

    public function setNomEnvoyeur(string $nomEnvoyeur): self
    {
        $this->nomEnvoyeur = $nomEnvoyeur;

        return $this;
    }

    public function getPrenomEnvoyeur(): ?string
    {
        return $this->prenomEnvoyeur;
    }

    public function setPrenomEnvoyeur(string $prenomEnvoyeur): self
    {
        $this->prenomEnvoyeur = $prenomEnvoyeur;

        return $this;
    }

    public function getTelephoneEnvoyeur(): ?string
    {
        return $this->telephoneEnvoyeur;
    }

    public function setTelephoneEnvoyeur(string $telephoneEnvoyeur): self
    {
        $this->telephoneEnvoyeur = $telephoneEnvoyeur;

        return $this;
    }

    public function getNCI(): ?int
    {
        return $this->nCI;
    }

    public function setNCI(int $nCI): self
    {
        $this->nCI = $nCI;

        return $this;
    }

    public function getNomRecepteur(): ?string
    {
        return $this->nomRecepteur;
    }

    public function setNomRecepteur(string $nomRecepteur): self
    {
        $this->nomRecepteur = $nomRecepteur;

        return $this;
    }

    public function getPrenomRecepteur(): ?string
    {
        return $this->prenomRecepteur;
    }

    public function setPrenomRecepteur(string $prenomRecepteur): self
    {
        $this->prenomRecepteur = $prenomRecepteur;

        return $this;
    }

    public function getTelephoneRecepteur(): ?int
    {
        return $this->telephoneRecepteur;
    }

    public function setTelephoneRecepteur(int $telephoneRecepteur): self
    {
        $this->telephoneRecepteur = $telephoneRecepteur;

        return $this;
    }

    public function getNCIRecepteur(): ?int
    {
        return $this->nCIRecepteur;
    }

    public function setNCIRecepteur(?int $nCIRecepteur): self
    {
        $this->nCIRecepteur = $nCIRecepteur;

        return $this;
    }

    /**
     * @return Collection|Transaction[]
     */
    public function getTransactions(): Collection
    {
        return $this->transactions;
    }

    public function addTransaction(Transaction $transaction): self
    {
        if (!$this->transactions->contains($transaction)) {
            $this->transactions[] = $transaction;
            $transaction->setClients($this);
        }

        return $this;
    }

    public function removeTransaction(Transaction $transaction): self
    {
        if ($this->transactions->contains($transaction)) {
            $this->transactions->removeElement($transaction);
            // set the owning side to null (unless already changed)
            if ($transaction->getClients() === $this) {
                $transaction->setClients(null);
            }
        }

        return $this;
    }
}
