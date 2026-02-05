<?php

namespace App\Entity;

use App\Repository\PlatosRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PlatosRepository::class)]
class Platos
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 6, scale: 2)]
    private ?string $price = null;

    #[ORM\Column(length: 255)]
    private ?string $category = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $allergens = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Tiempo en minutos")]
    private ?int $time_prep = null;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Unidades disponibles del plato")]
    #[Assert\GreaterThan(value: 0)]
    private ?int $stock_dis = 0;

    #[ORM\ManyToOne(inversedBy: 'platos')]
    #[Assert\NotBlank(message: "Camarero que recomienda el plato")]
    private ?Camareros $waiter_id = null;

    #[ORM\ManyToOne(inversedBy: 'dishes_id')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Pedidos $pedidos = null;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): static
    {
        $this->category = $category;

        return $this;
    }

    public function getAllergens(): ?string
    {
        return $this->allergens;
    }

    public function setAllergens(?string $allergens): static
    {
        $this->allergens = $allergens;

        return $this;
    }

    public function getTimePrep(): ?int
    {
        return $this->time_prep;
    }

    public function setTimePrep(int $time_prep): static
    {
        $this->time_prep = $time_prep;

        return $this;
    }

    public function getStockDis(): ?int
    {
        return $this->stock_dis;
    }

    public function setStockDis(int $stock_dis): static
    {
        $this->stock_dis = $stock_dis;

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

    public function getPedidos(): ?Pedidos
    {
        return $this->pedidos;
    }

    public function setPedidos(?Pedidos $pedidos): static
    {
        $this->pedidos = $pedidos;

        return $this;
    }
}
