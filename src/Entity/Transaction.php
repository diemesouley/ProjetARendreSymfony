<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     */
    private $commEtat;

    /**
     * @ORM\Column(type="integer")
     */
    private $commSys;

    /**
     * @ORM\Column(type="integer")
     */
    private $commExp;

    /**
     * @ORM\Column(type="integer")
     */
    private $commRecept;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $statusTransaction;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="transactions")
     */
    private $clients;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="transactions")
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ComptePartenaire", inversedBy="transactions")
     */
    private $comptepart;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $nomTransaction;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateRetrait;

    /**
     * @ORM\Column(type="integer")
     */
    private $codeTransaction;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist", "remove"})
     */
    private $RecupUser;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontant(): ?int
    {
        return $this->montant;
    }

    public function setMontant(int $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCommEtat(): ?int
    {
        return $this->commEtat;
    }

    public function setCommEtat(int $commEtat): self
    {
        $this->commEtat = $commEtat;

        return $this;
    }

    public function getCommSys(): ?int
    {
        return $this->commSys;
    }

    public function setCommSys(int $commSys): self
    {
        $this->commSys = $commSys;

        return $this;
    }

    public function getCommExp(): ?int
    {
        return $this->commExp;
    }

    public function setCommExp(int $commExp): self
    {
        $this->commExp = $commExp;

        return $this;
    }

    public function getCommRecept(): ?int
    {
        return $this->commRecept;
    }

    public function setCommRecept(int $commRecept): self
    {
        $this->commRecept = $commRecept;

        return $this;
    }

    public function getStatusTransaction(): ?string
    {
        return $this->statusTransaction;
    }

    public function setStatusTransaction(string $statusTransaction): self
    {
        $this->statusTransaction = $statusTransaction;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
    public function getClients(): ?Client
    {
        return $this->clients;
    }

    public function setClients(?Client $clients): self
    {
        $this->clients = $clients;

        return $this;
    }

    public function getComptepart(): ?ComptePartenaire
    {
        return $this->comptepart;
    }

    public function setComptepart(?ComptePartenaire $comptepart): self
    {
        $this->comptepart = $comptepart;

        return $this;
    }

    public function getNomTransaction(): ?string
    {
        return $this->nomTransaction;
    }

    public function setNomTransaction(string $nomTransaction): self
    {
        $this->nomTransaction = $nomTransaction;

        return $this;
    }

    public function getDateRetrait(): ?\DateTimeInterface
    {
        return $this->dateRetrait;
    }

    public function setDateRetrait(?\DateTimeInterface $dateRetrait): self
    {
        $this->dateRetrait = $dateRetrait;

        return $this;
    }

    public function getCodeTransaction(): ?int
    {
        return $this->codeTransaction;
    }

    public function setCodeTransaction(int $codeTransaction): self
    {
        $this->codeTransaction = $codeTransaction;

        return $this;
    }

}
