<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\Factory;

use Setono\SyliusPickupPointPlugin\Model\PickupPointCodeInterface;
use Webmozart\Assert\Assert;

class PickupPointCodeFactory implements PickupPointCodeFactoryInterface
{
    private $pickupPointCodeClass;

    public function __construct(string $pickupPointCodeClass)
    {
        $this->pickupPointCodeClass = $pickupPointCodeClass;
    }

    public function createNew(string $id, string $provider, string $country): PickupPointCodeInterface
    {
        $code = new $this->pickupPointCodeClass($id, $provider, $country);
        Assert::isInstanceOf($code, PickupPointCodeInterface::class);

        return $code;
    }

    public function createFromString(string $string): PickupPointCodeInterface
    {
        $code = $this->pickupPointCodeClass::createFromString($string);
        Assert::isInstanceOf($code, PickupPointCodeInterface::class);

        return $code;
    }
}
