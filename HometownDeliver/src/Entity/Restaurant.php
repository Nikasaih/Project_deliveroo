<?php

namespace App\Entity;

use App\Repository\RestaurantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    private $ListAllergene;

    /**
     * @ORM\OneToMany(targetEntity=Plat::class, mappedBy="Restaurant", orphanRemoval=true)
     */
    private $plats;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="Restaurants")
     */
    private $user;

    public function __construct()
    {
        $this->plats = new ArrayCollection();
    }

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

    public function getListAllergene(): ?string
    {
        return $this->ListAllergene;
    }

    public function setListAllergene(string $ListAllergene): self
    {
        $this->ListAllergene = $ListAllergene;

        return $this;
    }

    /**
     * @return Collection|Plat[]
     */
    public function getPlats(): Collection
    {
        return $this->plats;
    }

    public function addPlat(Plat $plat): self
    {
        if (!$this->plats->contains($plat)) {
            $this->plats[] = $plat;
            $plat->setRestaurant($this);
        }

        return $this;
    }

    public function removePlat(Plat $plat): self
    {
        if ($this->plats->removeElement($plat)) {
            // set the owning side to null (unless already changed)
            if ($plat->getRestaurant() === $this) {
                $plat->setRestaurant(null);
            }
        }

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
