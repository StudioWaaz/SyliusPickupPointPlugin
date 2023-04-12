<?php

namespace spec\Setono\SyliusPickupPointPlugin\Form\DataTransformer;

use PhpSpec\ObjectBehavior;
use Setono\SyliusPickupPointPlugin\Model\PickupPoint;
use Sylius\Component\Registry\ServiceRegistryInterface;
use Setono\SyliusPickupPointPlugin\Model\PickupPointCode;
use Setono\SyliusPickupPointPlugin\Provider\ProviderInterface;
use Setono\SyliusPickupPointPlugin\Factory\PickupPointCodeFactoryInterface;
use Setono\SyliusPickupPointPlugin\Form\DataTransformer\PickupPointToIdentifierTransformer;

class PickupPointToIdentifierTransformerSpec extends ObjectBehavior
{

    function let(ServiceRegistryInterface $providerRegistry)
    {
        $this->beConstructedWith($providerRegistry);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(PickupPointToIdentifierTransformer::class);
    }

    function it_transforms_a_pickup_point_to_an_identifier()
    {
        $pickupPoint = new PickupPoint;
        $pickupPointCode = new PickupPointCode('12345', 'faker', 'FR');
        $pickupPoint->setCode($pickupPointCode);

        $this->transform($pickupPoint)->shouldReturn($pickupPointCode);
    }

    function it_reverse_transforms_an_identifier_to_a_pickup_point(ServiceRegistryInterface $providerRegistry, ProviderInterface $provider)
    {
        $pickupPointCode = new PickupPointCode('12345', 'faker', 'FR');
        $pickupPoint = new PickupPoint;
        $pickupPoint->setCode($pickupPointCode);

        $providerRegistry->get('faker')->willReturn($provider);

        $provider->findPickupPoint($pickupPointCode)->willReturn($pickupPoint);

        $this->reverseTransform('faker---12345---FR')->shouldReturnAnInstanceOf(PickupPoint::class);
    }
}
