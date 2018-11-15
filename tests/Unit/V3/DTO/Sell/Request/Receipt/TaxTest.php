<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO\Sell\Request\Receipt;

use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item\Tax;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item\Tax
 *
 * @group unit
 */
class TaxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param int $integer
     * @param string $taxValue
     *
     * @dataProvider dataFromInteger
     */
    public function testFromInteger($integer, $taxValue): void
    {
        $tax = Tax::fromInteger($integer);

        $this->assertEquals($taxValue, $tax->getValue());
    }

    public function dataFromInteger(): array
    {
        return [
            [null, Tax::NONE],
            [0, Tax::VAT0],
            [10, Tax::VAT110],
            [18, Tax::VAT118],
        ];
    }

    /**
     * @param int $integer
     *
     * @dataProvider dataFromIntegerException
     * @expectedException \Lamoda\AtolClient\Exception\VatException
     */
    public function testFromIntegerException($integer): void
    {
        Tax::fromInteger($integer);
    }

    public function dataFromIntegerException(): array
    {
        return [
            [110],
            [118],
            [92],
        ];
    }
}
