<?php

namespace App\Entity;

use App\Repository\FacturelocRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FacturelocRepository::class)]
class Factureloc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'facturelocs')]
    private ?campagne $compagne = null;

    #[ORM\ManyToOne(inversedBy: 'facturelocs')]
    private ?tabmois $mois = null;

    #[ORM\ManyToOne(inversedBy: 'facturelocs')]
    private ?contratloc $contrat = null;

    #[ORM\ManyToOne(inversedBy: 'facturelocs')]
    private ?locataire $locataire = null;

    #[ORM\ManyToOne(inversedBy: 'facturelocs')]
    private ?appartement $appartement = null;

    #[ORM\Column(length: 255)]
    private ?string $LibFacture = null;

    #[ORM\Column]
    private ?int $MntFact = null;

    #[ORM\Column]
    private ?int $SoldeFactLoc = null;

    #[ORM\Column]
    private ?int $DateEmission = null;

    #[ORM\Column]
    private ?int $DateLimite = null;

    #[ORM\OneToMany(mappedBy: 'numFact', targetEntity: Reglements::class)]
    private Collection $reglements;

    public function __construct()
    {
        $this->reglements = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompagne(): ?campagne
    {
        return $this->compagne;
    }

    public function setCompagne(?campagne $compagne): static
    {
        $this->compagne = $compagne;

        return $this;
    }

    public function getMois(): ?tabmois
    {
        return $this->mois;
    }

    public function setMois(?tabmois $mois): static
    {
        $this->mois = $mois;

        return $this;
    }

    public function getContrat(): ?contratloc
    {
        return $this->contrat;
    }

    public function setContrat(?contratloc $contrat): static
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getLocataire(): ?locataire
    {
        return $this->locataire;
    }

    public function setLocataire(?locataire $locataire): static
    {
        $this->locataire = $locataire;

        return $this;
    }

    public function getAppartement(): ?appartement
    {
        return $this->appartement;
    }

    public function setAppartement(?appartement $appartement): static
    {
        $this->appartement = $appartement;

        return $this;
    }

    public function getLibFacture(): ?string
    {
        return $this->LibFacture;
    }

    public function setLibFacture(string $LibFacture): static
    {
        $this->LibFacture = $LibFacture;

        return $this;
    }

    public function getMntFact(): ?int
    {
        return $this->MntFact;
    }

    public function setMntFact(int $MntFact): static
    {
        $this->MntFact = $MntFact;

        return $this;
    }

    public function getSoldeFactLoc(): ?int
    {
        return $this->SoldeFactLoc;
    }

    public function setSoldeFactLoc(int $SoldeFactLoc): static
    {
        $this->SoldeFactLoc = $SoldeFactLoc;

        return $this;
    }

    public function getDateEmission(): ?int
    {
        return $this->DateEmission;
    }

    public function setDateEmission(int $DateEmission): static
    {
        $this->DateEmission = $DateEmission;

        return $this;
    }

    public function getDateLimite(): ?int
    {
        return $this->DateLimite;
    }

    public function setDateLimite(int $DateLimite): static
    {
        $this->DateLimite = $DateLimite;

        return $this;
    }

    /**
     * @return Collection<int, Reglements>
     */
    public function getReglements(): Collection
    {
        return $this->reglements;
    }

    public function addReglement(Reglements $reglement): static
    {
        if (!$this->reglements->contains($reglement)) {
            $this->reglements->add($reglement);
            $reglement->setNumFact($this);
        }

        return $this;
    }

    public function removeReglement(Reglements $reglement): static
    {
        if ($this->reglements->removeElement($reglement)) {
            // set the owning side to null (unless already changed)
            if ($reglement->getNumFact() === $this) {
                $reglement->setNumFact(null);
            }
        }

        return $this;
    }
}
