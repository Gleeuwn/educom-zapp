<?php

namespace App\Entity;

use App\Repository\TaakRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TaakRepository::class)]
class Taak
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $naam = null;

    #[ORM\Column(nullable: true)]
    private ?int $tijd = null;

    #[ORM\Column(length: 255)]
    private ?string $omschrijving = null;

    #[ORM\ManyToMany(targetEntity: Handeling::class, mappedBy: 'taak')]
    private Collection $handelings;

    public function __construct()
    {
        $this->handelings = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): static
    {
        $this->naam = $naam;

        return $this;
    }

    public function getTijd(): ?int
    {
        return $this->tijd;
    }

    public function setTijd(?int $tijd): static
    {
        $this->tijd = $tijd;

        return $this;
    }

    public function getOmschrijving(): ?string
    {
        return $this->omschrijving;
    }

    public function setOmschrijving(string $omschrijving): static
    {
        $this->omschrijving = $omschrijving;

        return $this;
    }

    /*
    @return Collection<int, Handeling>
     
    public function getHandelings(): Collection
    {
        return $this->handelings;
    }

    public function addHandeling(Handeling $handeling): static
    {
        if (!$this->handelings->contains($handeling)) {
            $this->handelings->add($handeling);
            $handeling->addTaak($this);
        }

        return $this;
    }

    public function removeHandeling(Handeling $handeling): static
    {
        if ($this->handelings->removeElement($handeling)) {
            $handeling->removeTaak($this);
        }

        return $this;
    }
    */
}
