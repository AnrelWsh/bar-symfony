<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use ApiPlatform\Metadata\ApiResource;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource()]
#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date_Creation = null;

    /**
     * @var Collection<int, Boisson>
     */
    #[ORM\ManyToMany(targetEntity: Boisson::class, inversedBy: 'commandes')]
    private Collection $Boisson;

    #[ORM\Column]
    private ?int $Numero_Table = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'commandes')]
    private Collection $Serveur;

    /**
     * @var Collection<int, User>
     */
    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'commandes')]
    private Collection $Barman;

    #[ORM\Column(length: 255)]
    private ?string $Status_Commande = null;

    public function __construct()
    {
        $this->Boisson = new ArrayCollection();
        $this->Serveur = new ArrayCollection();
        $this->Barman = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->Date_Creation;
    }

    public function setDateCreation(\DateTimeInterface $Date_Creation): static
    {
        $this->Date_Creation = $Date_Creation;

        return $this;
    }

    /**
     * @return Collection<int, Boisson>
     */
    public function getBoisson(): Collection
    {
        return $this->Boisson;
    }

    public function addBoisson(Boisson $boisson): static
    {
        if (!$this->Boisson->contains($boisson)) {
            $this->Boisson->add($boisson);
        }

        return $this;
    }

    public function removeBoisson(Boisson $boisson): static
    {
        $this->Boisson->removeElement($boisson);

        return $this;
    }

    public function getNumeroTable(): ?int
    {
        return $this->Numero_Table;
    }

    public function setNumeroTable(int $Numero_Table): static
    {
        $this->Numero_Table = $Numero_Table;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getServeur(): Collection
    {
        return $this->Serveur;
    }

    public function addServeur(User $serveur): static
    {
        if (!$this->Serveur->contains($serveur)) {
            $this->Serveur->add($serveur);
        }

        return $this;
    }

    public function removeServeur(User $serveur): static
    {
        $this->Serveur->removeElement($serveur);

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getBarman(): Collection
    {
        return $this->Barman;
    }

    public function addBarman(User $barman): static
    {
        if (!$this->Barman->contains($barman)) {
            $this->Barman->add($barman);
        }

        return $this;
    }

    public function removeBarman(User $barman): static
    {
        $this->Barman->removeElement($barman);

        return $this;
    }

    public function getStatusCommande(): ?string
    {
        return $this->Status_Commande;
    }

    public function setStatusCommande(string $Status_Commande): static
    {
        $this->Status_Commande = $Status_Commande;

        return $this;
    }
}
