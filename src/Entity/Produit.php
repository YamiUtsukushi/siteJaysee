<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $Description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Prix = null;

    #[ORM\Column(length: 255)]
    private ?string $Image = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $ListeIngredient = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $InfoNutritionnelles = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $OptionsPersonnalisation = null;

    #[ORM\ManyToOne(inversedBy: 'listeProduits')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Categorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): static
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): static
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->Prix;
    }

    public function setPrix(string $Prix): static
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): static
    {
        $this->Image = $Image;

        return $this;
    }

    public function getListeIngredient(): ?string
    {
        return $this->ListeIngredient;
    }

    public function setListeIngredient(string $ListeIngredient): static
    {
        $this->ListeIngredient = $ListeIngredient;

        return $this;
    }

    public function getInfoNutritionnelles(): ?string
    {
        return $this->InfoNutritionnelles;
    }

    public function setInfoNutritionnelles(string $InfoNutritionnelles): static
    {
        $this->InfoNutritionnelles = $InfoNutritionnelles;

        return $this;
    }

    public function getOptionsPersonnalisation(): ?string
    {
        return $this->OptionsPersonnalisation;
    }

    public function setOptionsPersonnalisation(string $OptionsPersonnalisation): static
    {
        $this->OptionsPersonnalisation = $OptionsPersonnalisation;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }
}
