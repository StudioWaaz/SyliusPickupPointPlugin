<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\Factory;

use Setono\SyliusPickupPointPlugin\Model\PickupPointCodeInterface;

interface PickupPointCodeFactoryInterface
{
    public function createNew(string $id, string $provider, string $country): PickupPointCodeInterface;

    public function createFromString(string $string): PickupPointCodeInterface;
}