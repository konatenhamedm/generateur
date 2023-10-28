<?php

namespace App\Entity;

use App\Repository\VersmtProprioRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VersmtProprioRepository::class)]
class VersmtProprio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $idCptProprio = null;

    #[ORM\ManyToOne(inversedBy: 'versmtProprios')]
    private ?proprio $proprio = null;

    #[ORM\ManyToOne(inversedBy: 'versmtProprios')]
    private ?TypeVersements $type_versement = null;

    #[ORM\ManyToOne(inversedBy: 'versmtProprios')]
    private ?Cptproprio $compte_proprio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdCptProprio(): ?int
    {
        return $this->idCptProprio;
    }

    public function setIdCptProprio(int $idCptProprio): static
    {
        $this->idCptProprio = $idCptProprio;

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

    public function getTypeVersement(): ?TypeVersements
    {
        return $this->type_versement;
    }

    public function setTypeVersement(?TypeVersements $type_versement): static
    {
        $this->type_versement = $type_versement;

        return $this;
    }

    public function getCompteProprio(): ?Cptproprio
    {
        return $this->compte_proprio;
    }

    public function setCompteProprio(?Cptproprio $compte_proprio): static
    {
        $this->compte_proprio = $compte_proprio;

        return $this;
    }
}
