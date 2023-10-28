<?php

namespace App\Entity;

use App\Repository\QuartierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: QuartierRepository::class)]
class Quartier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibQuartier = null;

    #[ORM\OneToMany(mappedBy: 'quartier', targetEntity: Maison::class)]
    private Collection $maisons;

    public function __construct()
    {
        $this->maisons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibQuartier(): ?string
    {
        return $this->LibQuartier;
    }

    public function setLibQuartier(string $LibQuartier): static
    {
        $this->LibQuartier = $LibQuartier;

        return $this;
    }

    /**
     * @return Collection<int, Maison>
     */
    public function getMaisons(): Collection
    {
        return $this->maisons;
    }

    public function addMaison(Maison $maison): static
    {
        if (!$this->maisons->contains($maison)) {
            $this->maisons->add($maison);
            $maison->setQuartier($this);
        }

        return $this;
    }

    public function removeMaison(Maison $maison): static
    {
        if ($this->maisons->removeElement($maison)) {
            // set the owning side to null (unless already changed)
            if ($maison->getQuartier() === $this) {
                $maison->setQuartier(null);
            }
        }

        return $this;
    }
}
