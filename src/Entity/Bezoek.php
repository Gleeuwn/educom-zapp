<?php

namespace App\Entity;

use App\Repository\BezoekRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BezoekRepository::class)]
class Bezoek
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'bezoeks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Medewerker $medewerker = null;

    #[ORM\ManyToOne(inversedBy: 'bezoeks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Klant $klant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datum = null;

    #[ORM\Column(type: Types::TIME_MUTABLE)]
    private ?\DateTimeInterface $tijd = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\OneToMany(mappedBy: 'bezoek', targetEntity: Handeling::class)]
    private Collection $handelings;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $aankomsttijd = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $vertrektijd = null;

    public function __construct()
    {
        $this->handelings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMedewerker(): ?Medewerker
    {
        return $this->medewerker;
    }

    public function setMedewerker(?Medewerker $medewerker): static
    {
        $this->medewerker = $medewerker;

        return $this;
    }

    public function getKlant(): ?Klant
    {
        return $this->klant;
    }

    public function setKlant(?Klant $klant): static
    {
        $this->klant = $klant;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->datum;
    }

    public function setDatum(\DateTimeInterface $datum): static
    {
        $this->datum = $datum;

        return $this;
    }

    public function getTijd(): ?\DateTimeInterface
    {
        return $this->tijd;
    }

    public function setTijd(\DateTimeInterface $tijd): static
    {
        $this->tijd = $tijd;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Handeling>
     */
    public function getHandelings(): Collection
    {
        return $this->handelings;
    }

    public function addHandeling(Handeling $handeling): static
    {
        if (!$this->handelings->contains($handeling)) {
            $this->handelings->add($handeling);
            $handeling->setBezoek($this);
        }

        return $this;
    }

    public function removeHandeling(Handeling $handeling): static
    {
        if ($this->handelings->removeElement($handeling)) {
            // set the owning side to null (unless already changed)
            if ($handeling->getBezoek() === $this) {
                $handeling->setBezoek(null);
            }
        }

        return $this;
    }

    public function getAankomsttijd(): ?\DateTimeInterface
    {
        return $this->aankomsttijd;
    }

    public function setAankomsttijd(?\DateTimeInterface $aankomsttijd): static
    {
        $this->aankomsttijd = $aankomsttijd;

        return $this;
    }

    public function getVertrektijd(): ?\DateTimeInterface
    {
        return $this->vertrektijd;
    }

    public function setVertrektijd(?\DateTimeInterface $vertrektijd): static
    {
        $this->vertrektijd = $vertrektijd;

        return $this;
    }
}
