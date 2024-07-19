<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource()]
#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 500)]
    private ?string $Path = null;

    #[ORM\OneToOne(mappedBy: 'Media', cascade: ['persist', 'remove'])]
    private ?Boisson $boisson = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->Path;
    }

    public function setPath(string $Path): static
    {
        $this->Path = $Path;

        return $this;
    }

    public function getBoisson(): ?Boisson
    {
        return $this->boisson;
    }

    public function setBoisson(?Boisson $boisson): static
    {
        // unset the owning side of the relation if necessary
        if ($boisson === null && $this->boisson !== null) {
            $this->boisson->setMedia(null);
        }

        // set the owning side of the relation if necessary
        if ($boisson !== null && $boisson->getMedia() !== $this) {
            $boisson->setMedia($this);
        }

        $this->boisson = $boisson;

        return $this;
    }
}
