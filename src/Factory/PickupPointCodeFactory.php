<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\Factory;

use Setono\SyliusPickupPointPlugin\Model\PickupPointCodeInterface;

class PickupPointCodeFactory implements PickupPointCodeFactoryInterface
{
    public function __construct(private string $pickupPointCodeClass)
    {
        $this->pickupPointCodeClass = $pickupPointCodeClass;
    }

    public function createNew(string $id, string $provider, string $country): PickupPointCodeInterface
    {
        return new $this->pickupPointCodeClass($id, $provider, $country);
    }

    public function createFromString(string $string): PickupPointCodeInterface
    {
        return $this->pickupPointCodeClass::createFromString($string);
    }
}