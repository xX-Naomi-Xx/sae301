<?php

namespace App\Entity;

use App\Repository\ServicesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServicesRepository::class)]
class Services
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom_service = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom_service(): ?string
    {
        return $this->nom_service;
    }

    public function setNom_service(string $nom): static
    {
        $this->nom_service = $nom_service;

        return $this;
    }
}
