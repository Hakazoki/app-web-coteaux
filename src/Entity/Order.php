<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column]
    private ?\DateTime $time_slot = null;

    #[ORM\Column(length: 20)]
    private ?string $pickup_location = null;

    #[ORM\Column]
    private ?float $total_price = null;

    #[ORM\ManyToOne(inversedBy: 'orders')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Users $Id_User = null;

    /**
     * @var Collection<int, SubOrder>
     */
    #[ORM\OneToMany(targetEntity: SubOrder::class, mappedBy: 'Id_Order')]
    private Collection $subOrders;

    public function __construct()
    {
        $this->subOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdOrder(): ?int
    {
        return $this->Id_Order;
    }

    public function setIdOrder(int $Id_Order): static
    {
        $this->Id_Order = $Id_Order;

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

    public function getTimeSlot(): ?\DateTime
    {
        return $this->time_slot;
    }

    public function setTimeSlot(\DateTime $time_slot): static
    {
        $this->time_slot = $time_slot;

        return $this;
    }

    public function getPickupLocation(): ?string
    {
        return $this->pickup_location;
    }

    public function setPickupLocation(string $pickup_location): static
    {
        $this->pickup_location = $pickup_location;

        return $this;
    }

    public function getTotalPrice(): ?float
    {
        return $this->total_price;
    }

    public function setTotalPrice(float $total_price): static
    {
        $this->total_price = $total_price;

        return $this;
    }

    public function getIdUser(): ?Users
    {
        return $this->Id_User;
    }

    public function setIdUser(?Users $Id_User): static
    {
        $this->Id_User = $Id_User;

        return $this;
    }

    /**
     * @return Collection<int, SubOrder>
     */
    public function getSubOrders(): Collection
    {
        return $this->subOrders;
    }

    public function addSubOrder(SubOrder $subOrder): static
    {
        if (!$this->subOrders->contains($subOrder)) {
            $this->subOrders->add($subOrder);
            $subOrder->setIdOrder($this);
        }

        return $this;
    }

    public function removeSubOrder(SubOrder $subOrder): static
    {
        if ($this->subOrders->removeElement($subOrder)) {
            // set the owning side to null (unless already changed)
            if ($subOrder->getIdOrder() === $this) {
                $subOrder->setIdOrder(null);
            }
        }

        return $this;
    }
}
