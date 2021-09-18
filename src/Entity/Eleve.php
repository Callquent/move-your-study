<?php

namespace App\Entity;

use App\Repository\EleveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EleveRepository::class)
 */
class Eleve
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
    private $idEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $groupeEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mailEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numeroEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $loginEleve;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passwordEleve;

    /**
     * @ORM\OneToMany(targetEntity=Absence::class, mappedBy="idEleve_Absence")
     */
    private $absences;

    /**
     * @ORM\ManyToMany(targetEntity=Cours::class, mappedBy="idEleve_Cours")
     */
    private $cours;

    public function __construct()
    {
        $this->absences = new ArrayCollection();
        $this->cours = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdEleve(): ?int
    {
        return $this->idEleve;
    }

    public function setIdEleve(int $idEleve): self
    {
        $this->idEleve = $idEleve;

        return $this;
    }

    public function getGroupeEleve(): ?string
    {
        return $this->groupeEleve;
    }

    public function setGroupeEleve(string $groupeEleve): self
    {
        $this->groupeEleve = $groupeEleve;

        return $this;
    }

    public function getPrenomEleve(): ?string
    {
        return $this->prenomEleve;
    }

    public function setPrenomEleve(string $prenomEleve): self
    {
        $this->prenomEleve = $prenomEleve;

        return $this;
    }

    public function getNomEleve(): ?string
    {
        return $this->nomEleve;
    }

    public function setNomEleve(string $nomEleve): self
    {
        $this->nomEleve = $nomEleve;

        return $this;
    }

    public function getMailEleve(): ?string
    {
        return $this->mailEleve;
    }

    public function setMailEleve(string $mailEleve): self
    {
        $this->mailEleve = $mailEleve;

        return $this;
    }

    public function getNumeroEleve(): ?string
    {
        return $this->numeroEleve;
    }

    public function setNumeroEleve(string $numeroEleve): self
    {
        $this->numeroEleve = $numeroEleve;

        return $this;
    }

    public function getLoginEleve(): ?string
    {
        return $this->loginEleve;
    }

    public function setLoginEleve(string $loginEleve): self
    {
        $this->loginEleve = $loginEleve;

        return $this;
    }

    public function getPasswordEleve(): ?string
    {
        return $this->passwordEleve;
    }

    public function setPasswordEleve(string $passwordEleve): self
    {
        $this->passwordEleve = $passwordEleve;

        return $this;
    }

    /**
     * @return Collection|Absence[]
     */
    public function getAbsences(): Collection
    {
        return $this->absences;
    }

    public function addAbsence(Absence $absence): self
    {
        if (!$this->absences->contains($absence)) {
            $this->absences[] = $absence;
            $absence->setIdEleveAbsence($this);
        }

        return $this;
    }

    public function removeAbsence(Absence $absence): self
    {
        if ($this->absences->removeElement($absence)) {
            // set the owning side to null (unless already changed)
            if ($absence->getIdEleveAbsence() === $this) {
                $absence->setIdEleveAbsence(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cours[]
     */
    public function getCours(): Collection
    {
        return $this->cours;
    }

    public function addCour(Cours $cour): self
    {
        if (!$this->cours->contains($cour)) {
            $this->cours[] = $cour;
            $cour->addIdEleveCour($this);
        }

        return $this;
    }

    public function removeCour(Cours $cour): self
    {
        if ($this->cours->removeElement($cour)) {
            $cour->removeIdEleveCour($this);
        }

        return $this;
    }
}
