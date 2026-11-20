<?php

namespace App\Entity;

use App\Repository\ProductsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductsRepository::class)]
class Products
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $name = null;

    #[ORM\Column(length: 50)]
    private ?string $status = null;

    #[ORM\Column]
    private ?int $delay = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $image = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 50)]
    private ?string $pricing_type = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Producter $Id_Producter = null;

    /**
     * @var Collection<int, SubOrder>
     */
    #[ORM\OneToMany(targetEntity: SubOrder::class, mappedBy: 'Id_Products')]
    private Collection $subOrders;

    public function __construct()
    {
        $this->subOrders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProducts(): ?int
    {
        return $this->Id_Products;
    }

    public function setIdProducts(int $Id_Products): static
    {
        $this->Id_Products = $Id_Products;

        return $this;
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

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getDelay(): ?int
    {
        return $this->delay;
    }

    public function setDelay(int $delay): static
    {
        $this->delay = $delay;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPricingType(): ?string
    {
        return $this->pricing_type;
    }

    public function setPricingType(string $pricing_type): static
    {
        $this->pricing_type = $pricing_type;

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

    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): static
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getIdProducter(): ?Producter
    {
        return $this->Id_Producter;
    }

    public function setIdProducter(?Producter $Id_Producter): static
    {
        $this->Id_Producter = $Id_Producter;

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
            $subOrder->setIdProducts($this);
        }

        return $this;
    }

    public function removeSubOrder(SubOrder $subOrder): static
    {
        if ($this->subOrders->removeElement($subOrder)) {
            // set the owning side to null (unless already changed)
            if ($subOrder->getIdProducts() === $this) {
                $subOrder->setIdProducts(null);
            }
        }

        return $this;
    }
}
