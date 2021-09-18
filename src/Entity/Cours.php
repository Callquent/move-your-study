<?php

namespace App\Entity;

use App\Repository\CoursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoursRepository::class)
 */
class Cours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $idCours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Groupes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomCours;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $salle;

    /**
     * @ORM\ManyToMany(targetEntity=Eleve::class, inversedBy="cours")
     */
    private $idEleve_Cours;

    /**
     * @ORM\ManyToMany(targetEntity=Prof::class, inversedBy="cours")
     */
    private $idEleve_Prof;

    public function __construct()
    {
        $this->idEleve_Cours = new ArrayCollection();
        $this->idEleve_Prof = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCours(): ?int
    {
        return $this->idCours;
    }

    public function setIdCours(int $idCours): self
    {
        $this->idCours = $idCours;

        return $this;
    }

    public function getGroupes(): ?string
    {
        return $this->Groupes;
    }

    public function setGroupes(string $Groupes): self
    {
        $this->Groupes = $Groupes;

        return $this;
    }

    public function getNomCours(): ?string
    {
        return $this->nomCours;
    }

    public function setNomCours(string $nomCours): self
    {
        $this->nomCours = $nomCours;

        return $this;
    }

    public function getSalle(): ?string
    {
        return $this->salle;
    }

    public function setSalle(string $salle): self
    {
        $this->salle = $salle;

        return $this;
    }

    /**
     * @return Collection|Eleve[]
     */
    public function getIdEleveCours(): Collection
    {
        return $this->idEleve_Cours;
    }

    public function addIdEleveCour(Eleve $idEleveCour): self
    {
        if (!$this->idEleve_Cours->contains($idEleveCour)) {
            $this->idEleve_Cours[] = $idEleveCour;
        }

        return $this;
    }

    public function removeIdEleveCour(Eleve $idEleveCour): self
    {
        $this->idEleve_Cours->removeElement($idEleveCour);

        return $this;
    }

    /**
     * @return Collection|Prof[]
     */
    public function getIdEleveProf(): Collection
    {
        return $this->idEleve_Prof;
    }

    public function addIdEleveProf(Prof $idEleveProf): self
    {
        if (!$this->idEleve_Prof->contains($idEleveProf)) {
            $this->idEleve_Prof[] = $idEleveProf;
        }

        return $this;
    }

    public function removeIdEleveProf(Prof $idEleveProf): self
    {
        $this->idEleve_Prof->removeElement($idEleveProf);

        return $this;
    }
}
