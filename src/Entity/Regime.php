<?php

namespace App\Entity;

use App\Repository\RegimeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RegimeRepository::class)]
class Regime
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibRegime = null;

    #[ORM\OneToMany(mappedBy: 'Regime', targetEntity: Contratloc::class)]
    private Collection $contratlocs;

    public function __construct()
    {
        $this->contratlocs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibRegime(): ?string
    {
        return $this->LibRegime;
    }

    public function setLibRegime(string $LibRegime): static
    {
        $this->LibRegime = $LibRegime;

        return $this;
    }

    /**
     * @return Collection<int, Contratloc>
     */
    public function getContratlocs(): Collection
    {
        return $this->contratlocs;
    }

    public function addContratloc(Contratloc $contratloc): static
    {
        if (!$this->contratlocs->contains($contratloc)) {
            $this->contratlocs->add($contratloc);
            $contratloc->setRegime($this);
        }

        return $this;
    }

    public function removeContratloc(Contratloc $contratloc): static
    {
        if ($this->contratlocs->removeElement($contratloc)) {
            // set the owning side to null (unless already changed)
            if ($contratloc->getRegime() === $this) {
                $contratloc->setRegime(null);
            }
        }

        return $this;
    }
}
