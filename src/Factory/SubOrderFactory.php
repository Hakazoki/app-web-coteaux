<?php

namespace App\Factory;

use App\Entity\SubOrder;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<SubOrder>
 */
final class SubOrderFactory extends PersistentObjectFactory
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
        return SubOrder::class;
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
            'id_Order' => OrderFactory::new(),
            'id_Products' => ProductsFactory::new(),
            'price' => self::faker()->randomFloat(),
            'producter_time_slot' => self::faker()->dateTime(),
            'quantity' => self::faker()->randomFloat(),
            'status' => self::faker()->RandomElement(["en attente", "prête", "retirée", "annulée"]),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(SubOrder $subOrder): void {})
        ;
    }
}
