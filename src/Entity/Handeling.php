<?php

namespace App\Entity;

use App\Repository\HandelingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HandelingRepository::class)]
class Handeling
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'handelings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?bezoek $bezoek = null;

    #[ORM\ManyToOne(targetEntity: Taak::class, inversedBy: 'handelings')]
    private ?Taak $taak = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    public function __construct()
    {
        $this->taak = null;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBezoek(): ?bezoek
    {
        return $this->bezoek;
    }

    public function setBezoek(?bezoek $bezoek): static
    {
        $this->bezoek = $bezoek;

        return $this;
    }

    public function getTaak(): ?Taak
    {
        return $this->taak;
    }

    public function setTaak(?Taak $taak): static
    {
        $this->taak = $taak;

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
}
