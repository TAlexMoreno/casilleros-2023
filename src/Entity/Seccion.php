<?php

namespace App\Entity;

use App\Repository\SeccionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SeccionRepository::class)]
class Seccion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'secciones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Municipio $municipio = null;

    #[ORM\ManyToOne(inversedBy: 'secciones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DistritoLocal $distritoLocal = null;

    #[ORM\ManyToOne(inversedBy: 'secciones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?DistritoFederal $distritoFederal = null;

    #[ORM\OneToMany(mappedBy: 'seccion', targetEntity: Casilla::class, orphanRemoval: true)]
    private Collection $casillas;

    public function __construct()
    {
        $this->casillas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMunicipio(): ?Municipio
    {
        return $this->municipio;
    }

    public function setMunicipio(?Municipio $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getDistritoLocal(): ?DistritoLocal
    {
        return $this->distritoLocal;
    }

    public function setDistritoLocal(?DistritoLocal $distritoLocal): self
    {
        $this->distritoLocal = $distritoLocal;

        return $this;
    }

    public function getDistritoFederal(): ?DistritoFederal
    {
        return $this->distritoFederal;
    }

    public function setDistritoFederal(?DistritoFederal $distritoFederal): self
    {
        $this->distritoFederal = $distritoFederal;

        return $this;
    }

    /**
     * @return Collection<int, Casilla>
     */
    public function getCasillas(): Collection
    {
        return $this->casillas;
    }

    public function addCasilla(Casilla $casilla): self
    {
        if (!$this->casillas->contains($casilla)) {
            $this->casillas->add($casilla);
            $casilla->setSeccion($this);
        }

        return $this;
    }

    public function removeCasilla(Casilla $casilla): self
    {
        if ($this->casillas->removeElement($casilla)) {
            // set the owning side to null (unless already changed)
            if ($casilla->getSeccion() === $this) {
                $casilla->setSeccion(null);
            }
        }

        return $this;
    }
}
