<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\Repository;

use Sylius\Component\Core\Model\OrderInterface;
use Setono\SyliusPickupPointPlugin\Model\PickupPointCode;
use Sylius\Component\Resource\Repository\RepositoryInterface;
use Setono\SyliusPickupPointPlugin\Model\PickupPointInterface;
use Setono\SyliusPickupPointPlugin\Model\PickupPointCodeInterface;

interface PickupPointRepositoryInterface extends RepositoryInterface
{
    public function findOneByCode(PickupPointCodeInterface $code): ?PickupPointInterface;

    /**
     * @psalm-return list<PickupPointInterface>
     */
    public function findByOrder(OrderInterface $order, string $provider): array;
}
