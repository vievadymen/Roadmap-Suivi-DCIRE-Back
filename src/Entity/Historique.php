<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Activite;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\HistoriqueRepository;

/**
 * @ORM\Entity(repositoryClass=HistoriqueRepository::class)
 */
class Historique
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $details;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $addresseIp;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="historiques")
     */
    private $user;

    public function __construct()
    {
        $this->date=new \DateTime("now");
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDetails(): ?string
    {
        return $this->details;
    }

    public function setDetails(string $details): self
    {
        $this->details = $details;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getAddresseIp(): ?string
    {
        return $this->addresseIp;
    }

    public function setAddresseIp(?string $addresseIp): self
    {
        $this->addresseIp = $addresseIp;

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

    
}
