<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO\Sell\Request;

use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt
 * @group unit
 */
class ReceiptTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param Item[]     $items
     * @param float      $total
     * @param Payment[]  $payments
     * @param Attributes $attributes
     */
    public function testGetters(array $items, float $total, array $payments, Attributes $attributes)
    {
        $receipt = new Receipt($items, $total, $payments, $attributes);

        $this->assertEquals($items, $receipt->getItems());
        $this->assertEquals($total, $receipt->getTotal());
        $this->assertEquals($payments, $receipt->getPayments());
        $this->assertEquals($attributes, $receipt->getAttributes());
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            [
                [$this->createMock(Item::class)],
                0.0,
                [$this->createMock(Payment::class)],
                $this->createMock(Attributes::class),
            ],
        ];
    }
}
