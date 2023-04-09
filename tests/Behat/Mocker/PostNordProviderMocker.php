<?php

declare(strict_types=1);

namespace Tests\Setono\SyliusPickupPointPlugin\Behat\Mocker;

use Sylius\Component\Core\Model\OrderInterface;
use Setono\SyliusPickupPointPlugin\Model\PickupPoint;
use Setono\SyliusPickupPointPlugin\Provider\Provider;
use Setono\SyliusPickupPointPlugin\Model\PickupPointCode;
use Setono\SyliusPickupPointPlugin\Model\PickupPointInterface;
use Setono\SyliusPickupPointPlugin\Model\PickupPointCodeInterface;

class PostNordProviderMocker extends Provider
{
    public const PICKUP_POINT_ID = '001';

    public function getCode(): string
    {
        return 'post_nord';
    }

    public function getName(): string
    {
        return 'PostNord';
    }

    public function findPickupPoints(OrderInterface $order): iterable
    {
        return [
            $this->findPickupPoint(new PickupPointCode('', '', '')),
        ];
    }

    public function findPickupPoint(PickupPointCodeInterface $code): ?PickupPointInterface
    {
        $pickupPoint = new PickupPoint();
        $pickupPoint->setCode(new PickupPointCode(self::PICKUP_POINT_ID, $this->getCode(), 'DK'));
        $pickupPoint->setName('Somewhere');
        $pickupPoint->setAddress('1 Rainbow str');
        $pickupPoint->setZipCode('4499');
        $pickupPoint->setCity('Aalborg');
        $pickupPoint->setCountry('DK');
        $pickupPoint->setLatitude(57.046707);
        $pickupPoint->setLongitude(9.935932);

        return $pickupPoint;
    }

    public function findAllPickupPoints(): iterable
    {
        return [
            $this->findPickupPoint(new PickupPointCode('', '', '')),
        ];
    }
}
