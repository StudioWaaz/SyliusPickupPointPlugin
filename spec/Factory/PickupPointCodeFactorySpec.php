<?php

namespace spec\Setono\SyliusPickupPointPlugin\Factory;

use PhpSpec\ObjectBehavior;
use Setono\SyliusPickupPointPlugin\Model\PickupPointCode;
use Setono\SyliusPickupPointPlugin\Factory\PickupPointCodeFactory;
use Setono\SyliusPickupPointPlugin\Model\PickupPointCodeInterface;
use Setono\SyliusPickupPointPlugin\Factory\PickupPointFactoryInterface;

class PickupPointCodeFactorySpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(PickupPointCode::class);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PickupPointCodeFactory::class);
    }

    function it_returns_a_pickup_point_code()
    {
        $this->createNew('567890', 'faker', 'FR')->shouldReturnAnInstanceOf(PickupPointCode::class);
        $this->createNew('567890', 'faker', 'FR')->shouldReturnAnInstanceOf(PickupPointCodeInterface::class);
    }

    public function it_returns_a_pickup_from_code()
    {
        $this->createFromString('567890---faker---FR')->shouldReturnAnInstanceOf(PickupPointCodeInterface::class);
    }
}
