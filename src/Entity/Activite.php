<?php

namespace App\Entity;

use App\Entity\User;
use DateTimeInterface;
use App\Entity\Evenement;
use App\Entity\Structure;
use App\Entity\Difficulte;
use App\Entity\Historique;
use App\Entity\TrancheHoraire;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\PointDeCoordination;
use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=ActiviteRepository::class)
 */
class Activite
{
    
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"difficulte:read ,pointDeCoordination:read"})
     * @Groups({"activite:read" })
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @Groups({"activite:read","structure:activite", "activite:show"})
     */
    protected $libelle;

    /**
     * @ORM\ManyToOne(targetEntity=Structure::class, inversedBy="activite")
     * @Groups({"activite:read", "activite:show"})
     */
    private $structure;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="activites")
     * @Groups({"activite:read", "activite:show"})
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=pointDeCoordination::class, mappedBy="activite")
     */
    private $pointDeCoordination;

    /**
     * @ORM\OneToMany(targetEntity=Difficulte::class, mappedBy="activite")
     * @Groups({"structure:active"})
     */
    private $difficulte;

    /**
     * @ORM\ManyToOne(targetEntity=trancheHoraire::class, inversedBy="activites")
     * @Groups({"activite:read"})
     */
    private $trancheHoraire;

    /**
     * @ORM\OneToOne(targetEntity=Historique::class, cascade={"persist", "remove"})
     */
    private $historique;

    /**
     * @ORM\ManyToMany(targetEntity=Evenement::class, mappedBy="activite")
     */
    private $evenements;

    /**
     * @ORM\Column(type="date")
     * @Groups({"activite:read","structure:activite"})
     * @Notblank
     */
    private $date;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $heure;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"activite:read","structure:activite"})
     */
    private $semaine;

    
    public function getId(): ?int
    {
        return $this->id;
    }


    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getStructure(): ?Structure
    {
        return $this->structure;
    }

    public function setStructure(?Structure $structure): self
    {
        $this->structure = $structure;

        return $this;
    }

    public function getUser(): ?user
    {
        return $this->user;
    }

    public function setUser(?user $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|pointDeCoordination[]
     */
    public function getPointDeCoordination(): Collection
    {
        return $this->pointDeCoordination;
    }

    public function addPointDeCoordination(pointDeCoordination $pointDeCoordination): self
    {
        if (!$this->pointDeCoordination->contains($pointDeCoordination)) {
            $this->pointDeCoordination[] = $pointDeCoordination;
            $pointDeCoordination->setActivite($this);
        }

        return $this;
    }

    public function removePointDeCoordination(pointDeCoordination $pointDeCoordination): self
    {
        if ($this->pointDeCoordination->removeElement($pointDeCoordination)) {
            // set the owning side to null (unless already changed)
            if ($pointDeCoordination->getActivite() === $this) {
                $pointDeCoordination->setActivite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|difficulte[]
     */
    public function getDifficulte(): Collection
    {
        return $this->difficulte;
    }

    public function addDifficulte(difficulte $difficulte): self
    {
        //if (!$this->difficulte->contains($difficulte)) {
           // $this->difficulte[] = $difficulte;
          //  $difficulte->setActivite($this);
     //   }

        return $this;
    }

    public function removeDifficulte(difficulte $difficulte): self
    {
        if ($this->difficulte->removeElement($difficulte)) {
            // set the owning side to null (unless already changed)
         //   if ($difficulte->getActivite() === $this) {
             //   $difficulte->setActivite(null);
           // }
        }

        return $this;
    }

    public function getTrancheHoraire(): ?trancheHoraire
    {
        return $this->trancheHoraire;
    }

    public function setTrancheHoraire(?trancheHoraire $trancheHoraire): self
    {
        $this->trancheHoraire = $trancheHoraire;

        return $this;
    }

    public function getHistorique(): ?Historique
    {
        return $this->historique;
    }

    public function setHistorique(?Historique $historique): self
    {
        $this->historique = $historique;

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
            $evenement->addActivite($this);
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->removeElement($evenement)) {
            $evenement->removeActivite($this);
        }

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

    public function getHeure(): ?\DateTimeInterface
    {
        return $this->heure;
    }

    public function setHeure(?\DateTimeInterface $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getSemaine(): ?string
    {
        return $this->semaine;
    }

    public function setSemaine(string $semaine): self
    {
        $this->semaine = $semaine;

        return $this;
    }


    
}
