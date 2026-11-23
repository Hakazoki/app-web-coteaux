<?php

namespace App\Factory;

use App\Entity\Products;
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
            'delay' => self::faker()->randomNumber(),
            'id_Producter' => ProducterFactory::new(),
            'image' => self::faker()->imageUrl(330, 500, 'couverture', true),
            'name' => self::faker()->text(50),
            'price' => self::faker()->randomFloat(),
            'pricing_type' => self::faker()->RandomElement(['unité', 'poids']),
            'quantity' => self::faker()->randomNumber(),
            'status' => self::faker()->RandomElement(['disponible', 'rupture de stock']),
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
