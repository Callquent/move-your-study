<?php

namespace App\Entity;

use App\Repository\AbsenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbsenceRepository::class)
 */
class Absence
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
    private $idAbsence;

    /**
     * @ORM\ManyToOne(targetEntity=Eleve::class, inversedBy="absences")
     */
    private $idEleve_Absence;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date_debut;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $date_fin;

    /**
     * @ORM\Column(type="binary")
     */
    private $justifier;

    /**
     * @ORM\Column(type="text")
     */
    private $text_verification;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAbsence(): ?int
    {
        return $this->idAbsence;
    }

    public function setIdAbsence(int $idAbsence): self
    {
        $this->idAbsence = $idAbsence;

        return $this;
    }

    public function getIdEleveAbsence(): ?Eleve
    {
        return $this->idEleve_Absence;
    }

    public function setIdEleveAbsence(?Eleve $idEleve_Absence): self
    {
        $this->idEleve_Absence = $idEleve_Absence;

        return $this;
    }

    public function getDateDebut(): ?string
    {
        return $this->date_debut;
    }

    public function setDateDebut(string $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?string
    {
        return $this->date_fin;
    }

    public function setDateFin(string $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getJustifier()
    {
        return $this->justifier;
    }

    public function setJustifier($justifier): self
    {
        $this->justifier = $justifier;

        return $this;
    }

    public function getTextVerification(): ?string
    {
        return $this->text_verification;
    }

    public function setTextVerification(string $text_verification): self
    {
        $this->text_verification = $text_verification;

        return $this;
    }
}
