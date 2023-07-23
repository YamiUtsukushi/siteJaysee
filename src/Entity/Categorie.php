<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nom = null;

    #[ORM\OneToMany(mappedBy: 'categorie', targetEntity: produit::class, orphanRemoval: true)]
    private Collection $listeProduits;

    public function __construct()
    {
        $this->listeProduits = new ArrayCollection();
        $this->produits = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, produit>
     */
    public function getListeProduits(): Collection
    {
        return $this->listeProduits;
    }

    public function addListeProduit(produit $listeProduit): static
    {
        if (!$this->listeProduits->contains($listeProduit)) {
            $this->listeProduits->add($listeProduit);
            $listeProduit->setCategorie($this);
        }

        return $this;
    }

    public function removeListeProduit(produit $listeProduit): static
    {
        if ($this->listeProduits->removeElement($listeProduit)) {
            // set the owning side to null (unless already changed)
            if ($listeProduit->getCategorie() === $this) {
                $listeProduit->setCategorie(null);
            }
        }

        return $this;
    }

}
