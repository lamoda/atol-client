<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO;

use Lamoda\AtolClient\Tests\Helper\ProtectedPropertiesTrait;
use Lamoda\AtolClient\V3\DTO\General\Error;
use Lamoda\AtolClient\V3\DTO\Sell\Response\Status;
use Lamoda\AtolClient\V3\DTO\SellResponse;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\SellResponse
 * @group unit
 */
class SellResponseTest extends \PHPUnit_Framework_TestCase
{
    use ProtectedPropertiesTrait;

    /**
     * @param array $values
     * @dataProvider dataGetters
     */
    public function testGetters(array $values)
    {
        $this->assertGettersReturnProtectedValues(new SellResponse(), $values);
    }

    public function dataGetters()
    {
        $values = [
            'uuid' => 'uuid',
            'status' => new Status(Status::FAIL),
            'timestamp' => new \DateTime(),
            'error' => $this->createMock(Error::class),
        ];

        return [
            'default' => [$values],
            'no_error' => [array_replace($values, [
                'error' => null,
            ])],
            'no_uuid' => [array_replace($values, [
                'uuid' => null,
            ])],
        ];
    }

    public static function assertSame($expected, $actual, $message = '')
    {
        parent::assertEquals($expected, $actual, $message = '');
    }
}
