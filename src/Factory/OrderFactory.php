<?php

namespace App\Factory;

use App\Entity\Order;
use App\Enum\OrderStatus;
use App\Enum\PickupLocation;
use Zenstruck\Foundry\Persistence\PersistentObjectFactory;

/**
 * @extends PersistentObjectFactory<Order>
 */
final class OrderFactory extends PersistentObjectFactory
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
        return Order::class;
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
            'id_User' => UsersFactory::new(),
            'pickup_location' => self::faker()->RandomElement(PickupLocation::cases()),
            'status' => self::faker()->RandomElement(StatusOrder::cases()),
            'time_slot' => self::faker()->dateTimeBetween('now', '+7 days'),
            'total_price' => self::faker()->randomFloat(2,5,150),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    #[\Override]
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(Order $order): void {})
        ;
    }
}
