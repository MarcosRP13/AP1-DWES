<?php

namespace App\Entity;

use App\Repository\PedidosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PedidosRepository::class)]
class Pedidos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $date_order = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTime $date_ent = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $state = "Confirmado";

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $observation = null;

    #[ORM\ManyToOne(inversedBy: 'pedidos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Clientes $client_id = null;

    /**
     * @var Collection<int, Platos>
     */
    #[ORM\OneToMany(targetEntity: Platos::class, mappedBy: 'pedidos')]
    private Collection $dishes_id;

    #[ORM\ManyToOne(inversedBy: 'pedidos')]
    private ?Camareros $waiter_id = null;

    public function __construct()
    {
        $this->dishes_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateOrder(): ?\DateTime
    {
        return $this->date_order;
    }

    public function setDateOrder(\DateTime $date_order): static
    {
        $this->date_order = $date_order;

        return $this;
    }

    public function getDateEnt(): ?\DateTime
    {
        return $this->date_ent;
    }

    public function setDateEnt(?\DateTime $date_ent): static
    {
        $this->date_ent = $date_ent;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(?string $state): static
    {
        $this->state = $state;

        return $this;
    }

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): static
    {
        $this->observation = $observation;

        return $this;
    }

    public function getClientId(): ?Clientes
    {
        return $this->client_id;
    }

    public function setClientId(?Clientes $client_id): static
    {
        $this->client_id = $client_id;

        return $this;
    }

    /**
     * @return Collection<int, Platos>
     */
    public function getDishesId(): Collection
    {
        return $this->dishes_id;
    }

    public function addDishesId(Platos $dishesId): static
    {
        if (!$this->dishes_id->contains($dishesId)) {
            $this->dishes_id->add($dishesId);
            $dishesId->setPedidos($this);
        }

        return $this;
    }

    public function removeDishesId(Platos $dishesId): static
    {
        if ($this->dishes_id->removeElement($dishesId)) {
            // set the owning side to null (unless already changed)
            if ($dishesId->getPedidos() === $this) {
                $dishesId->setPedidos(null);
            }
        }

        return $this;
    }

    public function getWaiterId(): ?Camareros
    {
        return $this->waiter_id;
    }

    public function setWaiterId(?Camareros $waiter_id): static
    {
        $this->waiter_id = $waiter_id;

        return $this;
    }
}
