<?php

namespace App\Entity;

use App\Repository\NatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NatureRepository::class)]
class Nature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $LibNature = null;

    #[ORM\OneToMany(mappedBy: 'Nature', targetEntity: Contratloc::class)]
    private Collection $contratlocs;

    public function __construct()
    {
        $this->contratlocs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibNature(): ?string
    {
        return $this->LibNature;
    }

    public function setLibNature(string $LibNature): static
    {
        $this->LibNature = $LibNature;

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
            $contratloc->setNature($this);
        }

        return $this;
    }

    public function removeContratloc(Contratloc $contratloc): static
    {
        if ($this->contratlocs->removeElement($contratloc)) {
            // set the owning side to null (unless already changed)
            if ($contratloc->getNature() === $this) {
                $contratloc->setNature(null);
            }
        }

        return $this;
    }
}
