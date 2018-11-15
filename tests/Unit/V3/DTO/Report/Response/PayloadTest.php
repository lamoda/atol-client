<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO\Report\Response;

use Lamoda\AtolClient\Tests\Helper\ProtectedPropertiesTrait;
use Lamoda\AtolClient\V3\DTO\Report\Response\Payload;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\Report\Response\Payload
 * @group unit
 */
class PayloadTest extends \PHPUnit_Framework_TestCase
{
    use ProtectedPropertiesTrait;

    /**
     * @param array $values
     * @dataProvider dataGetters
     */
    public function testGetters(array $values)
    {
        $this->assertGettersReturnProtectedValues(
            new Payload(
                $values['total'],
                $values['fnNumber'],
                $values['shiftNumber'],
                $values['receiptDatetime'],
                $values['fiscalReceiptNumber'],
                $values['fiscalDocumentNumber'],
                $values['ecrRegistrationNumber'],
                $values['fiscalDocumentAttribute']
            ),
            $values
        );
    }

    public function dataGetters()
    {
        return [
            'fill' => [
                [
                    'total' => 123,
                    'fnNumber' => 'number',
                    'shiftNumber' => 234,
                    'receiptDatetime' => new \DateTime(),
                    'fiscalReceiptNumber' => 345,
                    'fiscalDocumentNumber' => 456,
                    'ecrRegistrationNumber' => 'reg',
                    'fiscalDocumentAttribute' => 567,
                ],
            ],
        ];
    }
}
