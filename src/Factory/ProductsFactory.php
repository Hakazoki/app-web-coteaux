<?php

namespace App\Factory;

use App\Entity\Products;
use App\Enum\PricingType;
use App\Enum\Status;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Products>
 */
final class ProductsFactory extends PersistentObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    #[\Override]
    public static function class(): string
    {
        return Products::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    #[\Override]
    protected function defaults(): array|callable
    {
        return [
            'delay' => self::faker()->numberBetween(1,5),
            'id_Producter' => ProducterFactory::new(),
            'image' => self::faker()->imageUrl(330, 500, 'couverture', true),
            'name' => self::faker()->word(),
            'price' => self::faker()->randomFloat(2,5,150),
            'pricing_type' => self::faker()->RandomElement(PricingType::cases()),
            'quantity' => self::faker()->numberBetween(200, 1000),
            'status' => self::faker()->RandomElement(Status::cases()),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Products $products): void {})
        ;
    }
}
