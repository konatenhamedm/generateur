<?php

namespace App\Entity;

use App\Repository\ProprioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProprioRepository::class)]
class Proprio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $NomPrenoms = null;

    #[ORM\Column(length: 255)]
    private ?string $Contacts = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse = null;

    #[ORM\Column(length: 255)]
    private ?string $NumCNI = null;

    #[ORM\Column(length: 255)]
    private ?string $CNI = null;

    #[ORM\Column(length: 255)]
    private ?string $NomPere = null;

    #[ORM\Column(length: 255)]
    private ?string $NomMere = null;

    #[ORM\Column(length: 255)]
    private ?string $WhatsApp = null;

    #[ORM\Column(length: 255)]
    private ?string $Datenaiss = null;

    #[ORM\Column(length: 255)]
    private ?string $LieuNaiss = null;

    #[ORM\Column(length: 255)]
    private ?string $Profession = null;

    #[ORM\Column(length: 255)]
    private ?string $DateCNI = null;

    #[ORM\Column(length: 255)]
    private ?string $NomPrenoms_R = null;

    #[ORM\Column(length: 255)]
    private ?string $Contacts_R = null;

    #[ORM\Column(length: 255)]
    private ?string $Email_R = null;

    #[ORM\Column(length: 255)]
    private ?string $Adresse_R = null;

    #[ORM\Column(length: 255)]
    private ?string $NumCNI_R = null;

    #[ORM\Column(length: 255)]
    private ?string $NomPere_R = null;

    #[ORM\Column(length: 255)]
    private ?string $NomMere_R = null;

    #[ORM\Column(length: 255)]
    private ?string $WhatsApp_R = null;

    #[ORM\Column(length: 255)]
    private ?string $Datenaiss_R = null;

    #[ORM\Column(length: 255)]
    private ?string $Profession_R = null;

    #[ORM\Column(length: 255)]
    private ?string $DateCNI_R = null;

    #[ORM\Column(length: 255)]
    private ?string $Lien = null;

    #[ORM\Column]
    private ?float $Commission = null;

    #[ORM\Column]
    private ?int $TotalDu = null;

    #[ORM\Column]
    private ?int $TotalPaye = null;

    #[ORM\OneToMany(mappedBy: 'proprio', targetEntity: Maison::class)]
    private Collection $maisons;

    #[ORM\OneToMany(mappedBy: 'proprio', targetEntity: VersmtProprio::class)]
    private Collection $versmtProprios;

    #[ORM\OneToMany(mappedBy: 'proprio', targetEntity: Cptproprio::class)]
    private Collection $cptproprios;

    public function __construct()
    {
        $this->maisons = new ArrayCollection();
        $this->versmtProprios = new ArrayCollection();
        $this->cptproprios = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomPrenoms(): ?string
    {
        return $this->NomPrenoms;
    }

    public function setNomPrenoms(string $NomPrenoms): static
    {
        $this->NomPrenoms = $NomPrenoms;

        return $this;
    }

    public function getContacts(): ?string
    {
        return $this->Contacts;
    }

    public function setContacts(string $Contacts): static
    {
        $this->Contacts = $Contacts;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): static
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getNumCNI(): ?string
    {
        return $this->NumCNI;
    }

    public function setNumCNI(string $NumCNI): static
    {
        $this->NumCNI = $NumCNI;

        return $this;
    }

    public function getCNI(): ?string
    {
        return $this->CNI;
    }

    public function setCNI(string $CNI): static
    {
        $this->CNI = $CNI;

        return $this;
    }

    public function getNomPere(): ?string
    {
        return $this->NomPere;
    }

    public function setNomPere(string $NomPere): static
    {
        $this->NomPere = $NomPere;

        return $this;
    }

    public function getNomMere(): ?string
    {
        return $this->NomMere;
    }

    public function setNomMere(string $NomMere): static
    {
        $this->NomMere = $NomMere;

        return $this;
    }

    public function getWhatsApp(): ?string
    {
        return $this->WhatsApp;
    }

    public function setWhatsApp(string $WhatsApp): static
    {
        $this->WhatsApp = $WhatsApp;

        return $this;
    }

    public function getDatenaiss(): ?string
    {
        return $this->Datenaiss;
    }

    public function setDatenaiss(string $Datenaiss): static
    {
        $this->Datenaiss = $Datenaiss;

        return $this;
    }

    public function getLieuNaiss(): ?string
    {
        return $this->LieuNaiss;
    }

    public function setLieuNaiss(string $LieuNaiss): static
    {
        $this->LieuNaiss = $LieuNaiss;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->Profession;
    }

    public function setProfession(string $Profession): static
    {
        $this->Profession = $Profession;

        return $this;
    }

    public function getDateCNI(): ?string
    {
        return $this->DateCNI;
    }

    public function setDateCNI(string $DateCNI): static
    {
        $this->DateCNI = $DateCNI;

        return $this;
    }

    public function getNomPrenomsR(): ?string
    {
        return $this->NomPrenoms_R;
    }

    public function setNomPrenomsR(string $NomPrenoms_R): static
    {
        $this->NomPrenoms_R = $NomPrenoms_R;

        return $this;
    }

    public function getContactsR(): ?string
    {
        return $this->Contacts_R;
    }

    public function setContactsR(string $Contacts_R): static
    {
        $this->Contacts_R = $Contacts_R;

        return $this;
    }

    public function getEmailR(): ?string
    {
        return $this->Email_R;
    }

    public function setEmailR(string $Email_R): static
    {
        $this->Email_R = $Email_R;

        return $this;
    }

    public function getAdresseR(): ?string
    {
        return $this->Adresse_R;
    }

    public function setAdresseR(string $Adresse_R): static
    {
        $this->Adresse_R = $Adresse_R;

        return $this;
    }

    public function getNumCNIR(): ?string
    {
        return $this->NumCNI_R;
    }

    public function setNumCNIR(string $NumCNI_R): static
    {
        $this->NumCNI_R = $NumCNI_R;

        return $this;
    }

    public function getNomPereR(): ?string
    {
        return $this->NomPere_R;
    }

    public function setNomPereR(string $NomPere_R): static
    {
        $this->NomPere_R = $NomPere_R;

        return $this;
    }

    public function getNomMereR(): ?string
    {
        return $this->NomMere_R;
    }

    public function setNomMereR(string $NomMere_R): static
    {
        $this->NomMere_R = $NomMere_R;

        return $this;
    }

    public function getWhatsAppR(): ?string
    {
        return $this->WhatsApp_R;
    }

    public function setWhatsAppR(string $WhatsApp_R): static
    {
        $this->WhatsApp_R = $WhatsApp_R;

        return $this;
    }

    public function getDatenaissR(): ?string
    {
        return $this->Datenaiss_R;
    }

    public function setDatenaissR(string $Datenaiss_R): static
    {
        $this->Datenaiss_R = $Datenaiss_R;

        return $this;
    }

    public function getProfessionR(): ?string
    {
        return $this->Profession_R;
    }

    public function setProfessionR(string $Profession_R): static
    {
        $this->Profession_R = $Profession_R;

        return $this;
    }

    public function getDateCNIR(): ?string
    {
        return $this->DateCNI_R;
    }

    public function setDateCNIR(string $DateCNI_R): static
    {
        $this->DateCNI_R = $DateCNI_R;

        return $this;
    }

    public function getLien(): ?string
    {
        return $this->Lien;
    }

    public function setLien(string $Lien): static
    {
        $this->Lien = $Lien;

        return $this;
    }

    public function getCommission(): ?float
    {
        return $this->Commission;
    }

    public function setCommission(float $Commission): static
    {
        $this->Commission = $Commission;

        return $this;
    }

    public function getTotalDu(): ?int
    {
        return $this->TotalDu;
    }

    public function setTotalDu(int $TotalDu): static
    {
        $this->TotalDu = $TotalDu;

        return $this;
    }

    public function getTotalPaye(): ?int
    {
        return $this->TotalPaye;
    }

    public function setTotalPaye(int $TotalPaye): static
    {
        $this->TotalPaye = $TotalPaye;

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
            $maison->setProprio($this);
        }

        return $this;
    }

    public function removeMaison(Maison $maison): static
    {
        if ($this->maisons->removeElement($maison)) {
            // set the owning side to null (unless already changed)
            if ($maison->getProprio() === $this) {
                $maison->setProprio(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, VersmtProprio>
     */
    public function getVersmtProprios(): Collection
    {
        return $this->versmtProprios;
    }

    public function addVersmtProprio(VersmtProprio $versmtProprio): static
    {
        if (!$this->versmtProprios->contains($versmtProprio)) {
            $this->versmtProprios->add($versmtProprio);
            $versmtProprio->setProprio($this);
        }

        return $this;
    }

    public function removeVersmtProprio(VersmtProprio $versmtProprio): static
    {
        if ($this->versmtProprios->removeElement($versmtProprio)) {
            // set the owning side to null (unless already changed)
            if ($versmtProprio->getProprio() === $this) {
                $versmtProprio->setProprio(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Cptproprio>
     */
    public function getCptproprios(): Collection
    {
        return $this->cptproprios;
    }

    public function addCptproprio(Cptproprio $cptproprio): static
    {
        if (!$this->cptproprios->contains($cptproprio)) {
            $this->cptproprios->add($cptproprio);
            $cptproprio->setProprio($this);
        }

        return $this;
    }

    public function removeCptproprio(Cptproprio $cptproprio): static
    {
        if ($this->cptproprios->removeElement($cptproprio)) {
            // set the owning side to null (unless already changed)
            if ($cptproprio->getProprio() === $this) {
                $cptproprio->setProprio(null);
            }
        }

        return $this;
    }
}
