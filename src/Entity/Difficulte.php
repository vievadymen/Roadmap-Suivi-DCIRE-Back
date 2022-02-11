<?php

namespace App\Entity;

use App\Entity\User;
use App\Entity\Activite;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\DifficulteRepository;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=DifficulteRepository::class)
 * 
 */
class Difficulte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"difficulte:read", "difficulte:show", "structure:diff"})
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     * @Groups({"structure:active", "difficulte:show" ,"structure:diff" , "difficulte:read"})
     * @Notblank
     */
    private $description;

    /**
     * @ORM\Column(type="datetime")
     * @var string A "d-m-y " formatted value
     * @Groups({"difficulte:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer")
     * @Groups({"structure:diff" })
     */
    private $semaine;

    /**
     * @ORM\ManyToOne(targetEntity=Structure::class, inversedBy="difficulte")
     */
    private $structure;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="difficulte")
     */
    private $user;



    public function __constructor()
    {
        //$this->createdAt = new \Datetime();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getSemaine(): ?int
    {
        return $this->semaine;
    }

    public function setSemaine(int $semaine): self
    {
        $this->semaine = $semaine;

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
