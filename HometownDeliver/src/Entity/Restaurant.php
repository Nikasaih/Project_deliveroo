<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RestaurantRepository::class)
 */
class Restaurant
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
    private $NomRestaurant;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Localisation;

    /**
     * @ORM\Column(type="text")
     */
    private $HoraireOuverture;

    /**
     * @ORM\Column(type="text")
     */
    private $InfosComplementaire;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ListAllergène;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRestaurant(): ?string
    {
        return $this->NomRestaurant;
    }

    public function setNomRestaurant(string $NomRestaurant): self
    {
        $this->NomRestaurant = $NomRestaurant;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->Localisation;
    }

    public function setLocalisation(string $Localisation): self
    {
        $this->Localisation = $Localisation;

        return $this;
    }

    public function getHoraireOuverture(): ?string
    {
        return $this->HoraireOuverture;
    }

    public function setHoraireOuverture(string $HoraireOuverture): self
    {
        $this->HoraireOuverture = $HoraireOuverture;

        return $this;
    }

    public function getInfosComplementaire(): ?string
    {
        return $this->InfosComplementaire;
    }

    public function setInfosComplementaire(string $InfosComplementaire): self
    {
        $this->InfosComplementaire = $InfosComplementaire;

        return $this;
    }

    public function getListAllergène(): ?string
    {
        return $this->ListAllergène;
    }

    public function setListAllergène(string $ListAllergène): self
    {
        $this->ListAllergène = $ListAllergène;

        return $this;
    }
}
