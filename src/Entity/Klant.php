<?php

namespace App\Entity;

use App\Repository\KlantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: KlantRepository::class)]
class Klant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $voornaam = null;

    #[ORM\Column(length: 255)]
    private ?string $achternaam = null;

    #[ORM\Column(length: 255)]
    private ?string $straat = null;

    #[ORM\Column(length: 5)]
    private ?string $huisnummer = null;

    #[ORM\Column(length: 10)]
    private ?string $postcode = null;

    #[ORM\Column(length: 255)]
    private ?string $woonplaats = null;

    #[ORM\Column(length: 20)]
    private ?string $telefoonnummer = null;

    #[ORM\OneToMany(mappedBy: 'klant', targetEntity: Bezoek::class)]
    private Collection $bezoeks;

    public function __construct()
    {
        $this->bezoeks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVoornaam(): ?string
    {
        return $this->voornaam;
    }

    public function setVoornaam(string $voornaam): static
    {
        $this->voornaam = $voornaam;

        return $this;
    }

    public function getAchternaam(): ?string
    {
        return $this->achternaam;
    }

    public function setAchternaam(string $achternaam): static
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    public function getStraat(): ?string
    {
        return $this->straat;
    }

    public function setStraat(string $straat): static
    {
        $this->straat = $straat;

        return $this;
    }

    public function getHuisnummer(): ?string
    {
        return $this->huisnummer;
    }

    public function setHuisnummer(string $huisnummer): static
    {
        $this->huisnummer = $huisnummer;

        return $this;
    }

    public function getPostcode(): ?string
    {
        return $this->postcode;
    }

    public function setPostcode(string $postcode): static
    {
        $this->postcode = $postcode;

        return $this;
    }

    public function getWoonplaats(): ?string
    {
        return $this->woonplaats;
    }

    public function setWoonplaats(string $woonplaats): static
    {
        $this->woonplaats = $woonplaats;

        return $this;
    }

    public function getTelefoonnummer(): ?string
    {
        return $this->telefoonnummer;
    }

    public function setTelefoonnummer(string $telefoonnummer): static
    {
        $this->telefoonnummer = $telefoonnummer;

        return $this;
    }

    /**
     * @return Collection<int, Bezoek>
     */
    public function getBezoeks(): Collection
    {
        return $this->bezoeks;
    }

    public function addBezoek(Bezoek $bezoek): static
    {
        if (!$this->bezoeks->contains($bezoek)) {
            $this->bezoeks->add($bezoek);
            $bezoek->setKlant($this);
        }

        return $this;
    }

    public function removeBezoek(Bezoek $bezoek): static
    {
        if ($this->bezoeks->removeElement($bezoek)) {
            // set the owning side to null (unless already changed)
            if ($bezoek->getKlant() === $this) {
                $bezoek->setKlant(null);
            }
        }

        return $this;
    }
}
