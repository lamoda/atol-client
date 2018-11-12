<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO\Sell\Request\Receipt;

use Lamoda\AtolClient\Tests\Helper\ProtectedPropertiesTrait;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item\Tax;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item
 * @group unit
 */
class ItemTest extends \PHPUnit_Framework_TestCase
{
    use ProtectedPropertiesTrait;

    /**
     * @param array $values
     * @dataProvider dataGetters
     */
    public function testGetters(array $values)
    {
        $attributes = new Item(
            $values['name'],
            $values['price'],
            $values['quantity'],
            $values['sum'],
            $values['tax'],
            $values['taxsum']
        );

        $this->assertSame($values['name'], $attributes->getName());
        $this->assertSame($values['price'], $attributes->getPrice());
        $this->assertSame($values['quantity'], $attributes->getQuantity());
        $this->assertSame($values['sum'], $attributes->getSum());
        $this->assertSame($values['tax'], $attributes->getTax());
        $this->assertSame($values['taxsum'], $attributes->getTaxsum());
    }

    public function dataGetters()
    {
        return [
            'fill' => [
                [
                    'name' => 'name',
                    'price' => 123.45,
                    'quantity' => 234.56,
                    'sum' => 345.67,
                    'tax' => new Tax(Tax::VAT10),
                    'taxsum' => 456.78,
                ],
            ],
        ];
    }
}
