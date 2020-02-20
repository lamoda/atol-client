<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO;

use Lamoda\AtolClient\Tests\Helper\ProtectedPropertiesTrait;
use Lamoda\AtolClient\V3\DTO\General\Error;
use Lamoda\AtolClient\V3\DTO\GetTokenResponse;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\GetTokenResponse
 * @group unit
 */
class GetTokenResponseTest extends TestCase
{
    use ProtectedPropertiesTrait;

    /**
     * @param array $values
     * @param int $codeInProperty
     * @param Error\ErrorCode $codeFromGetter
     * @dataProvider dataGetters
     */
    public function testGetters(array $values, $codeInProperty, $codeFromGetter)
    {
        $object = new GetTokenResponse();
        $this->assertGettersReturnProtectedValues($object, $values);
        $this->setPropertiesValues($object, ['code' => $codeInProperty]);
        $this->assertEquals($codeFromGetter, $object->getCode());
    }

    public function dataGetters()
    {
        $values = [
            'text' => 'text',
            'token' => 'token',
        ];

        return [
            'default' => [$values, 1, new Error\ErrorCode(1)],
        ];
    }
}
