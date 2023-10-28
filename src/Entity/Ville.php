<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VilleRepository::class)]
class Ville
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $lib_ville = null;

    #[ORM\Column(length: 255)]
    private ?string $abrege_ville = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibVille(): ?string
    {
        return $this->lib_ville;
    }

    public function setLibVille(string $lib_ville): static
    {
        $this->lib_ville = $lib_ville;

        return $this;
    }

    public function getAbregeVille(): ?string
    {
        return $this->abrege_ville;
    }

    public function setAbregeVille(string $abrege_ville): static
    {
        $this->abrege_ville = $abrege_ville;

        return $this;
    }
}
