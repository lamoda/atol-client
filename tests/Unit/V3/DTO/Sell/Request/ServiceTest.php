<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO\Sell\Request;

use Lamoda\AtolClient\Tests\Helper\ProtectedPropertiesTrait;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Service;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\Sell\Request\Service
 * @group unit
 */
class ServiceTest extends \PHPUnit_Framework_TestCase
{
    use ProtectedPropertiesTrait;

    /**
     * @param array $values
     * @dataProvider dataGetters
     */
    public function testGetters(array $values)
    {
        $this->assertSameProperties(
            new Service($values['inn'], $values['paymentAddress'], $values['callbackUrl']),
            $values
        );
    }

    public function dataGetters()
    {
        return [
            'fill' => [
                [
                    'inn' => 'inn',
                    'paymentAddress' => 'paymentAddress',
                    'callbackUrl' => 'callbackUrl',
                ],
            ],
            'null' => [
                [
                    'inn' => null,
                    'paymentAddress' => null,
                    'callbackUrl' => null,
                ],
            ],
        ];
    }
}
