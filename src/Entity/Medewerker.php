<?php

namespace App\Entity;

use App\Repository\MedewerkerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MedewerkerRepository::class)]
class Medewerker
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $voornaam = null;

    #[ORM\Column(length: 50)]
    private ?string $achternaam = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $functie = null;

    #[ORM\OneToMany(mappedBy: 'medewerker', targetEntity: Bezoek::class)]
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

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): static
    {
        $this->username = $username;

        return $this;
    }


    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getFunctie(): ?string
    {
        return $this->functie;
    }

    public function setFunctie(string $functie): static
    {
        $this->functie = $functie;

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
            $bezoek->setMedewerker($this);
        }

        return $this;
    }

    public function removeBezoek(Bezoek $bezoek): static
    {
        if ($this->bezoeks->removeElement($bezoek)) {
            // set the owning side to null (unless already changed)
            if ($bezoek->getMedewerker() === $this) {
                $bezoek->setMedewerker(null);
            }
        }

        return $this;
    }
}
