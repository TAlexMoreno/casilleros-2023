<?php

namespace App\Entity;

use App\Repository\EntidadRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntidadRepository::class)]
class Entidad
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nombre = null;

    #[ORM\OneToMany(mappedBy: 'entidad', targetEntity: Municipio::class, orphanRemoval: true)]
    private Collection $municipios;

    public function __construct()
    {
        $this->municipios = new ArrayCollection();
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
     * @return Collection<int, Municipio>
     */
    public function getMunicipios(): Collection
    {
        return $this->municipios;
    }

    public function addMunicipio(Municipio $municipio): self
    {
        if (!$this->municipios->contains($municipio)) {
            $this->municipios->add($municipio);
            $municipio->setEntidad($this);
        }

        return $this;
    }

    public function removeMunicipio(Municipio $municipio): self
    {
        if ($this->municipios->removeElement($municipio)) {
            // set the owning side to null (unless already changed)
            if ($municipio->getEntidad() === $this) {
                $municipio->setEntidad(null);
            }
        }

        return $this;
    }
}
