<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\Model;

interface PickupPointCodeInterface
{
    public function __construct(string $id, string $provider, string $country);

    public function __toString(): string;

    public static function createFromString(string $string): self;

    public function getValue(): string;

    public function getIdPart(): string;

    public function getProviderPart(): string;

    public function getCountryPart(): string;
}
