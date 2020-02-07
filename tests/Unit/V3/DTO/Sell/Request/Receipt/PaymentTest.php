<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO\Sell\Request\Receipt;

use Lamoda\AtolClient\Tests\Helper\ProtectedPropertiesTrait;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment
 * @group unit
 */
class PaymentTest extends TestCase
{
    use ProtectedPropertiesTrait;

    /**
     * @param array $values
     * @dataProvider dataGetters
     */
    public function testGetters(array $values)
    {
        $attributes = new Payment($values['sum'], $values['type']);
        $this->assertSameProperties($attributes, $values);
    }

    public function dataGetters()
    {
        return [
            'fill' => [
                [
                    'sum' => 123.45,
                    'type' => new Payment\PaymentType(Payment\PaymentType::EXTENDED_A),
                ],
            ],
        ];
    }
}
