<?php

namespace App\Entity;

use App\Repository\CharactersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CharactersRepository::class)
 * @ORM\Table(name="CharacterTable")
 */
class Character
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $citation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $titleDesc;

    /**
     * @ORM\Column(type="string", length=1500)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nomReel;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Age;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mondeOrigine;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capTactique;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capPassive;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capUltime;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getCitation(): ?string
    {
        return $this->citation;
    }

    public function setCitation(string $citation): self
    {
        $this->citation = $citation;

        return $this;
    }

    public function getTitleDesc(): ?string
    {
        return $this->titleDesc;
    }

    public function setTitleDesc(string $titleDesc): self
    {
        $this->titleDesc = $titleDesc;

        return $this;
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

    public function getNomReel(): ?string
    {
        return $this->nomReel;
    }

    public function setNomReel(?string $nomReel): self
    {
        $this->nomReel = $nomReel;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(?int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getMondeOrigine(): ?string
    {
        return $this->mondeOrigine;
    }

    public function setMondeOrigine(?string $mondeOrigine): self
    {
        $this->mondeOrigine = $mondeOrigine;

        return $this;
    }

    public function getCapTactique(): ?string
    {
        return $this->capTactique;
    }

    public function setCapTactique(string $capTactique): self
    {
        $this->capTactique = $capTactique;

        return $this;
    }

    public function getCapPassive(): ?string
    {
        return $this->capPassive;
    }

    public function setCapPassive(string $capPassive): self
    {
        $this->capPassive = $capPassive;

        return $this;
    }

    public function getCapUltime(): ?string
    {
        return $this->capUltime;
    }

    public function setCapUltime(string $capUltime): self
    {
        $this->capUltime = $capUltime;

        return $this;
    }
}
