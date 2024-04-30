<?php

namespace App\Entity\Exforman;

use App\Repository\Exforman\SaisieAlimentationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SaisieAlimentationRepository::class)]
class SaisieAlimentation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $typeMateriau = null;

    #[ORM\Column]
    private ?int $quantite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeMateriau(): ?string
    {
        return $this->typeMateriau;
    }

    public function setTypeMateriau(string $typeMateriau): static
    {
        $this->typeMateriau = $typeMateriau;

        return $this;
    }

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): static
    {
        $this->quantite = $quantite;

        return $this;
    }
}
