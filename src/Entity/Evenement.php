<?php

namespace App\Entity;

use App\Entity\User;
use DateTimeInterface;
use App\Entity\Activite;
use App\Entity\Autorite;
use App\Entity\Commentaire;
use App\Entity\Periodicite;
use App\Entity\TrancheHoraire;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\HistoriqueEvenement;
use App\Repository\EvenementRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=EvenementRepository::class)
 * @UniqueEntity( 
 *     fields={"thematique"},
 *     message="Le thématique doit être unique")
 */
class Evenement
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"commentaire:read", "evenement:read"})
     */
    private $id;

    /**
     * @ORM\Column(type="text" )
     * @Groups({"evenement:read" ,"structure:event" ,"structure:show" ,"evenement:detail" ,"autorite:read"})
     * 
     */
    private $thematique;


    /**
     * @ORM\Column(type="string", length=255, nullable=true )
     * @Groups({"commentaire:read" ,"evenement:read" ,"evenement:detail"})
     */
    private $etat;

    /**
     * @ORM\ManyToOne(targetEntity=Structure::class, inversedBy="evenement", cascade={"persist"})
     * @Groups({"commentaire:read" ,"evenement:read" ,"evenement:detail"})
     */
    private $structure;

    /**
     * @ORM\OneToMany(targetEntity=commentaire::class, mappedBy="evenement", cascade={"persist"} )
     * @ORM\JoinColumn(nullable=true)
     * @Groups({"commentaire:read" ,"evenement:read" ,"evenement:detail"})
     */
    private $commentaire;

    
    private $historiqueEvenement;

    private $periodicite;
   

    /**
     * @ORM\OneToMany(targetEntity=TrancheHoraire::class, mappedBy="evenement" ,cascade={"persist"})
     * 
     */
    private $trancheHoraires;

    /**
     * @ORM\ManyToOne(targetEntity=user::class, inversedBy="evenements")
     * @Groups({"evenement:read" ,"structure:show" ,"evenement:detail"})
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity=activite::class, inversedBy="evenements")
     */
    private $activite;

    /**
     * @ORM\OneToMany(targetEntity=Autorite::class, mappedBy="evenement")
     */
    private $autorites;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"commentaire:read","structure:event" ,"evenement:read" ,"evenement:detail"})
     * @Notblank
     */
    private $start;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"commentaire:read" ,"structure:event" ,"evenement:read" ,"evenement:detail"})
     */
    private $end;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     * @Groups({"commentaire:read" ,"structure:event" ,"evenement:read" ,"evenement:detail"})
     */
    private $confirmation;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"evenement:read" ,"evenement:detail"})
     */
    private $semaine;

    public function __construct()
    {
        $this->commentaire = new ArrayCollection();
        $this->autorite = new ArrayCollection();
        $this->trancheHoraires = new ArrayCollection();
        $this->activite = new ArrayCollection();
        $this->autorites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getThematique(): ?string
    {
        return $this->thematique;
    }

    public function setThematique(string $thematique): self
    {
        $this->thematique = $thematique;

        return $this;
    }

    public function getEtat(): ?string
    {
        return $this->etat;
    }

    public function setEtat(string $etat): self
    {
        $this->etat = $etat;

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

    /**
     * @return Collection|commentaire[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setEvenement($this);
        }

        return $this;
    }

    public function removeCommentaire(commentaire $commentaire): self
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getEvenement() === $this) {
                $commentaire->setEvenement(null);
            }
        }

        return $this;
    }

    public function getHistoriqueEvenement(): ?historiqueEvenement
    {
        return $this->historiqueEvenement;
    }

    public function setHistoriqueEvenement(?historiqueEvenement $historiqueEvenement): self
    {
        $this->historiqueEvenement = $historiqueEvenement;

        return $this;
    }

    public function getPeriodicite(): ?periodicite
    {
        return $this->periodicite;
    }

    public function setPeriodicite(?periodicite $periodicite): self
    {
        $this->periodicite = $periodicite;

        return $this;
    }

   

    /**
     * @return Collection|TrancheHoraire[]
     */
    public function getTrancheHoraires(): Collection
    {
        return $this->trancheHoraires;
    }

    public function addTrancheHoraire(TrancheHoraire $trancheHoraire): self
    {
        if (!$this->trancheHoraires->contains($trancheHoraire)) {
            $this->trancheHoraires[] = $trancheHoraire;
            $trancheHoraire->setEvenement($this);
        }

        return $this;
    }

    public function removeTrancheHoraire(TrancheHoraire $trancheHoraire): self
    {
        if ($this->trancheHoraires->removeElement($trancheHoraire)) {
            // set the owning side to null (unless already changed)
            if ($trancheHoraire->getEvenement() === $this) {
                $trancheHoraire->setEvenement(null);
            }
        }

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
     * @return Collection|activite[]
     */
    public function getActivite(): Collection
    {
        return $this->activite;
    }

    public function addActivite(activite $activite): self
    {
        if (!$this->activite->contains($activite)) {
            $this->activite[] = $activite;
        }

        return $this;
    }

    public function removeActivite(activite $activite): self
    {
        $this->activite->removeElement($activite);

        return $this;
    }

    /**
     * @return Collection|Autorite[]
     */
    public function getAutorites(): Collection
    {
        return $this->autorites;
    }

    public function addAutorite(Autorite $autorite): self
    {
        if (!$this->autorites->contains($autorite)) {
            $this->autorites[] = $autorite;
            $autorite->setEvenement($this);
        }

        return $this;
    }

    public function removeAutorite(Autorite $autorite): self
    {
        if ($this->autorites->removeElement($autorite)) {
            // set the owning side to null (unless already changed)
            if ($autorite->getEvenement() === $this) {
                $autorite->setEvenement(null);
            }
        }

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(?\DateTimeInterface $start): self
    {
        $this->start = $start;

        return $this;
    }

    public function getEnd(): ?\DateTimeInterface
    {
        return $this->end;
    }

    public function setEnd(?\DateTimeInterface $end): self
    {
        $this->end = $end;

        return $this;
    }

    public function getConfirmation(): ?bool
    {
        return $this->confirmation;
    }

    public function setConfirmation(?bool $confirmation): self
    {
        $this->confirmation = $confirmation;

        return $this;
    }

    public function getSemaine(): ?int
    {
        return $this->semaine;
    }

    public function setSemaine(?int $semaine): self
    {
        $this->semaine = $semaine;

        return $this;
    }
}
