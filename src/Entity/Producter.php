<?php

namespace App\Entity;

use App\Repository\ProducterRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProducterRepository::class)]
class Producter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 80)]
    private ?string $full_name = null;

    #[ORM\Column(length: 50)]
    private ?string $activity = null;

    /**
     * @var Collection<int, Products>
     */
    #[ORM\OneToMany(targetEntity: Products::class, mappedBy: 'Id_Producter')]
    private Collection $products;

    #[ORM\OneToOne(mappedBy: 'Id_Producter', cascade: ['persist', 'remove'])]
    private ?Users $users = null;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProducter(): ?int
    {
        return $this->Id_Producter;
    }

    public function setIdProducter(int $Id_Producter): static
    {
        $this->Id_Producter = $Id_Producter;

        return $this;
    }

    public function getFullName(): ?string
    {
        return $this->full_name;
    }

    public function setFullName(string $full_name): static
    {
        $this->full_name = $full_name;

        return $this;
    }

    public function getActivity(): ?string
    {
        return $this->activity;
    }

    public function setActivity(string $activity): static
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * @return Collection<int, Products>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setIdProducter($this);
        }

        return $this;
    }

    public function removeProduct(Products $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getIdProducter() === $this) {
                $product->setIdProducter(null);
            }
        }

        return $this;
    }

    public function getUsers(): ?Users
    {
        return $this->users;
    }

    public function setUsers(?Users $users): static
    {
        // unset the owning side of the relation if necessary
        if ($users === null && $this->users !== null) {
            $this->users->setIdProducter(null);
        }

        // set the owning side of the relation if necessary
        if ($users !== null && $users->getIdProducter() !== $this) {
            $users->setIdProducter($this);
        }

        $this->users = $users;

        return $this;
    }
}
