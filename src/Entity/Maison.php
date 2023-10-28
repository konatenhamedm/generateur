<?php

namespace App\Entity;

use App\Repository\MaisonRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MaisonRepository::class)]
class Maison
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibMaison = null;

    #[ORM\Column(length: 255)]
    private ?string $Localisation = null;

    #[ORM\Column(length: 255)]
    private ?string $Lot = null;

    #[ORM\Column(length: 255)]
    private ?string $Ilot = null;

    #[ORM\Column(length: 255)]
    private ?string $TFoncier = null;

    #[ORM\Column]
    private ?int $MntCom = null;

    #[ORM\OneToMany(mappedBy: 'maisson', targetEntity: Appartement::class)]
    private Collection $appartements;

    #[ORM\Column]
    private ?int $IdAgent = null;

    #[ORM\ManyToOne(inversedBy: 'maisons')]
    private ?Quartier $quartier = null;

    #[ORM\ManyToOne(inversedBy: 'maisons')]
    private ?proprio $proprio = null;

    #[ORM\ManyToOne(inversedBy: 'maisons')]
    private ?typemaison $typemaison = null;

    public function __construct()
    {
        $this->appartements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibMaison(): ?string
    {
        return $this->LibMaison;
    }

    public function setLibMaison(string $LibMaison): static
    {
        $this->LibMaison = $LibMaison;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->Localisation;
    }

    public function setLocalisation(string $Localisation): static
    {
        $this->Localisation = $Localisation;

        return $this;
    }

    public function getLot(): ?string
    {
        return $this->Lot;
    }

    public function setLot(string $Lot): static
    {
        $this->Lot = $Lot;

        return $this;
    }

    public function getIlot(): ?string
    {
        return $this->Ilot;
    }

    public function setIlot(string $Ilot): static
    {
        $this->Ilot = $Ilot;

        return $this;
    }

    public function getTFoncier(): ?string
    {
        return $this->TFoncier;
    }

    public function setTFoncier(string $TFoncier): static
    {
        $this->TFoncier = $TFoncier;

        return $this;
    }

    public function getMntCom(): ?int
    {
        return $this->MntCom;
    }

    public function setMntCom(int $MntCom): static
    {
        $this->MntCom = $MntCom;

        return $this;
    }

    /**
     * @return Collection<int, Appartement>
     */
    public function getAppartements(): Collection
    {
        return $this->appartements;
    }

    public function addAppartement(Appartement $appartement): static
    {
        if (!$this->appartements->contains($appartement)) {
            $this->appartements->add($appartement);
            $appartement->setMaisson($this);
        }

        return $this;
    }

    public function removeAppartement(Appartement $appartement): static
    {
        if ($this->appartements->removeElement($appartement)) {
            // set the owning side to null (unless already changed)
            if ($appartement->getMaisson() === $this) {
                $appartement->setMaisson(null);
            }
        }

        return $this;
    }

    public function getIdAgent(): ?int
    {
        return $this->IdAgent;
    }

    public function setIdAgent(int $IdAgent): static
    {
        $this->IdAgent = $IdAgent;

        return $this;
    }

    public function getQuartier(): ?Quartier
    {
        return $this->quartier;
    }

    public function setQuartier(?Quartier $quartier): static
    {
        $this->quartier = $quartier;

        return $this;
    }

    public function getProprio(): ?proprio
    {
        return $this->proprio;
    }

    public function setProprio(?proprio $proprio): static
    {
        $this->proprio = $proprio;

        return $this;
    }

    public function getTypemaison(): ?typemaison
    {
        return $this->typemaison;
    }

    public function setTypemaison(?typemaison $typemaison): static
    {
        $this->typemaison = $typemaison;

        return $this;
    }
}
