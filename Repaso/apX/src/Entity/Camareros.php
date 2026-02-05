<?php

namespace App\Entity;

use App\Repository\CamarerosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CamarerosRepository::class)]
class Camareros
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 100)]
    private ?string $lastName = null;

    #[ORM\Column(length: 9, unique: true)]
    private ?string $dni = null;

    #[ORM\Column(length: 15)]
    private ?string $telephone = null;

    #[ORM\Column(length: 150)]
    private ?string $email = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_cont = null;

    #[ORM\Column(length: 255)]
    private ?string $shift = null;

    #[ORM\Column]
    private ?bool $active = true;

    /**
     * @var Collection<int, Platos>
     */
    #[ORM\OneToMany(targetEntity: Platos::class, mappedBy: 'waiter_id')]
    private Collection $platos;

    /**
     * @var Collection<int, Pedidos>
     */
    #[ORM\OneToMany(targetEntity: Pedidos::class, mappedBy: 'waiter_id')]
    private Collection $pedidos;

    public function __construct()
    {
        $this->platos = new ArrayCollection();
        $this->pedidos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getDni(): ?string
    {
        return $this->dni;
    }

    public function setDni(string $dni): static
    {
        $this->dni = $dni;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getDateCont(): ?\DateTime
    {
        return $this->date_cont;
    }

    public function setDateCont(\DateTime $date_cont): static
    {
        $this->date_cont = $date_cont;

        return $this;
    }

    public function getShift(): ?string
    {
        return $this->shift;
    }

    public function setShift(string $shift): static
    {
        $this->shift = $shift;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->active;
    }

    public function setActive(bool $active): static
    {
        $this->active = $active;

        return $this;
    }

    /**
     * @return Collection<int, Platos>
     */
    public function getPlatos(): Collection
    {
        return $this->platos;
    }

    public function addPlato(Platos $plato): static
    {
        if (!$this->platos->contains($plato)) {
            $this->platos->add($plato);
            $plato->setWaiterId($this);
        }

        return $this;
    }

    public function removePlato(Platos $plato): static
    {
        if ($this->platos->removeElement($plato)) {
            // set the owning side to null (unless already changed)
            if ($plato->getWaiterId() === $this) {
                $plato->setWaiterId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Pedidos>
     */
    public function getPedidos(): Collection
    {
        return $this->pedidos;
    }

    public function addPedido(Pedidos $pedido): static
    {
        if (!$this->pedidos->contains($pedido)) {
            $this->pedidos->add($pedido);
            $pedido->setWaiterId($this);
        }

        return $this;
    }

    public function removePedido(Pedidos $pedido): static
    {
        if ($this->pedidos->removeElement($pedido)) {
            // set the owning side to null (unless already changed)
            if ($pedido->getWaiterId() === $this) {
                $pedido->setWaiterId(null);
            }
        }

        return $this;
    }
}
