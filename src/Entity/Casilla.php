<?php

namespace App\Entity;

use App\Repository\CasillaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CasillaRepository::class)]
class Casilla
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'casillas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Seccion $seccion = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TipoCasilla $tipo = null;

    #[ORM\Column]
    private ?bool $urbana = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $domicilio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSeccion(): ?Seccion
    {
        return $this->seccion;
    }

    public function setSeccion(?Seccion $seccion): self
    {
        $this->seccion = $seccion;

        return $this;
    }

    public function getTipo(): ?TipoCasilla
    {
        return $this->tipo;
    }

    public function setTipo(?TipoCasilla $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function isUrbana(): ?bool
    {
        return $this->urbana;
    }

    public function setUrbana(bool $urbana): self
    {
        $this->urbana = $urbana;

        return $this;
    }

    public function getDomicilio(): ?string
    {
        return $this->domicilio;
    }

    public function setDomicilio(?string $domicilio): self
    {
        $this->domicilio = $domicilio;

        return $this;
    }
}
