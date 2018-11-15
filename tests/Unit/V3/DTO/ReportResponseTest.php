<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO;

use Lamoda\AtolClient\Tests\Helper\ProtectedPropertiesTrait;
use Lamoda\AtolClient\V3\DTO\General\Error;
use Lamoda\AtolClient\V3\DTO\Report\Response\Payload;
use Lamoda\AtolClient\V3\DTO\Report\Response\Status;
use Lamoda\AtolClient\V3\DTO\ReportResponse;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\ReportResponse
 * @group unit
 */
class ReportResponseTest extends \PHPUnit_Framework_TestCase
{
    use ProtectedPropertiesTrait;

    /**
     * @param array $values
     * @dataProvider dataGetters
     */
    public function testGetters(array $values)
    {
        $this->assertGettersReturnProtectedValues(new ReportResponse(), $values);
    }

    public function dataGetters()
    {
        $values = [
            'uuid' => 'uuid',
            'status' => new Status(Status::FAIL),
            'timestamp' => new \DateTime(),
            'error' => $this->createMock(Error::class),
            'payload' => $this->createMock(Payload::class),
            'callbackUrl' => 'url',
        ];

        return [
            'default' => [$values],
            'no_error' => [array_replace($values, [
                'error' => null,
            ])],
        ];
    }

    public static function assertSame($expected, $actual, $message = '')
    {
        parent::assertEquals($expected, $actual, $message = '');
    }
}
