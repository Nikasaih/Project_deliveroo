<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlatRepository::class)
 */
class Plat
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
    private $PrixUnit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NomPlat;

    /**
     * @ORM\Column(type="float")
     */
    private $Note;

    /**
     * @ORM\ManyToOne(targetEntity=Restaurant::class, inversedBy="plats")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Restaurant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrixUnit(): ?int
    {
        return $this->PrixUnit;
    }

    public function setPrixUnit(int $PrixUnit): self
    {
        $this->PrixUnit = $PrixUnit;

        return $this;
    }

    public function getNomPlat(): ?string
    {
        return $this->NomPlat;
    }

    public function setNomPlat(string $NomPlat): self
    {
        $this->NomPlat = $NomPlat;

        return $this;
    }

    public function getNote(): ?float
    {
        return $this->Note;
    }

    public function setNote(float $Note): self
    {
        $this->Note = $Note;

        return $this;
    }

    public function getRestaurant(): ?Restaurant
    {
        return $this->Restaurant;
    }

    public function setRestaurant(?Restaurant $Restaurant): self
    {
        $this->Restaurant = $Restaurant;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
