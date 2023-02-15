<?php

namespace App\Entity;

use App\Repository\DistritoLocalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DistritoLocalRepository::class)]
class DistritoLocal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(mappedBy: 'distritoLocal', targetEntity: Seccion::class, orphanRemoval: true)]
    private Collection $secciones;

    public function __construct()
    {
        $this->secciones = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * @return Collection<int, Seccion>
     */
    public function getSecciones(): Collection
    {
        return $this->secciones;
    }

    public function addSeccione(Seccion $seccione): self
    {
        if (!$this->secciones->contains($seccione)) {
            $this->secciones->add($seccione);
            $seccione->setDistritoLocal($this);
        }

        return $this;
    }

    public function removeSeccione(Seccion $seccione): self
    {
        if ($this->secciones->removeElement($seccione)) {
            // set the owning side to null (unless already changed)
            if ($seccione->getDistritoLocal() === $this) {
                $seccione->setDistritoLocal(null);
            }
        }

        return $this;
    }
}
