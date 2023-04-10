<?php

declare(strict_types=1);

namespace Setono\SyliusPickupPointPlugin\Repository;

use Setono\SyliusPickupPointPlugin\Model\PickupPointCodeInterface;
use Setono\SyliusPickupPointPlugin\Model\PickupPointInterface;
use Sylius\Component\Core\Model\OrderInterface;
use Sylius\Component\Resource\Repository\RepositoryInterface;

interface PickupPointRepositoryInterface extends RepositoryInterface
{
    public function findOneByCode(PickupPointCodeInterface $code): ?PickupPointInterface;

    /**
     * @psalm-return list<PickupPointInterface>
     */
    public function findByOrder(OrderInterface $order, string $provider): array;
}
