<?php

namespace App\Entity;

use App\Entity\Evenement;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\PeriodiciteRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PeriodiciteRepository::class)
 */
class Periodicite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @var string A "d-m-y " formatted value
     * @Groups({"evenement:read" ,"evenement:detail"})
     */
    private $dateDebut;

    /**
     * @ORM\Column(type="date")
     * @var string A "d-m-y " formatted value
     * @Groups({"evenement:read" ,"evenement:detail"})
     */
    private $dateFin;

    /**
     * @ORM\OneToMany(targetEntity=Evenement::class, mappedBy="periodicite")
     */
    private $evenements;

    public function __construct()
    {
        $this->evenements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->dateDebut;
    }

    public function setDateDebut(\DateTimeInterface $dateDebut): self
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTimeInterface $dateFin): self
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
            $evenement->setPeriodicite($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            // set the owning side to null (unless already changed)
            if ($evenement->getPeriodicite() === $this) {
                $evenement->setPeriodicite(null);
            }
        }

        return $this;
    }
}
