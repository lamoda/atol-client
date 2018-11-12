<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO;

use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Service;
use Lamoda\AtolClient\V3\DTO\SellRequest;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\SellRequest
 * @group unit
 */
class SellRequestTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     *
     * @param Service        $service
     * @param Receipt        $receipt
     * @param string         $token
     * @param string|null    $externalId
     * @param \DateTime|null $timestamp
     */
    public function testGetters(
        Service $service,
        Receipt $receipt,
        string $token,
        string $externalId = null,
        \DateTime $timestamp = null
    ) {
        $request = new SellRequest(
            $service,
            $receipt,
            $token,
            $externalId,
            $timestamp
        );

        $this->assertEquals($service, $request->getService());
        $this->assertEquals($receipt, $request->getReceipt());
        $this->assertEquals($token, $request->getToken());
        $this->assertEquals($externalId, $request->getExternalId());
        $this->assertEquals($timestamp, $request->getTimestamp());
    }

    /**
     * @return array
     */
    public function dataProvider()
    {
        return [
            [
                $this->createMock(Service::class),
                $this->createMock(Receipt::class),
                'token',
                'externalId',
                new \DateTime(),
            ],
        ];
    }
}
