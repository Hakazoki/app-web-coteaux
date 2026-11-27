<?php

namespace App\Entity;

use App\Enum\StatusOrder;
use App\Repository\SubOrderRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SubOrderRepository::class)]
class SubOrder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $quantity = null;

    #[ORM\Column(enumType: StatusOrder::class)]
    private StatusOrder $status = StatusOrder::PENDING;

    #[ORM\Column]
    private ?\DateTime $producter_time_slot = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\ManyToOne(inversedBy: 'subOrders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Products $Id_Products = null;

    #[ORM\ManyToOne(inversedBy: 'subOrders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Order $Id_Order = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdSubOrder(): ?int
    {
        return $this->Id_Sub_Order;
    }

    public function setIdSubOrder(int $Id_Sub_Order): static
    {
        $this->Id_Sub_Order = $Id_Sub_Order;

        return $this;
    }

    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    public function setQuantity(float $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getProducterTimeSlot(): ?\DateTime
    {
        return $this->producter_time_slot;
    }

    public function setProducterTimeSlot(\DateTime $producter_time_slot): static
    {
        $this->producter_time_slot = $producter_time_slot;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }

    public function getIdProducts(): ?Products
    {
        return $this->Id_Products;
    }

    public function setIdProducts(?Products $Id_Products): static
    {
        $this->Id_Products = $Id_Products;

        return $this;
    }

    public function getIdOrder(): ?Order
    {
        return $this->Id_Order;
    }

    public function setIdOrder(?Order $Id_Order): static
    {
        $this->Id_Order = $Id_Order;

        return $this;
    }
}
