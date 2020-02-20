<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO\General;

use Lamoda\AtolClient\Tests\Helper\ProtectedPropertiesTrait;
use Lamoda\AtolClient\V3\DTO\General\Error;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\General\Error
 * @group unit
 */
class ErrorTest extends TestCase
{
    use ProtectedPropertiesTrait;

    /**
     * @param array $values
     * @param mixed $propertyCode
     * @param mixed $codeFromGetter
     * @dataProvider dataGetters
     */
    public function testGetters(array $values, $propertyCode, $codeFromGetter)
    {
        $error = new Error();
        $this->assertGettersReturnProtectedValues($error, $values);
        $this->setPropertiesValues($error, ['code' => $propertyCode]);
        $this->assertEquals($codeFromGetter, $error->getCode());
    }

    public function dataGetters()
    {
        return [
            'fill' => [
                [
                    'text' => 'text',
                    'type' => 'type',
                ],
                1,
                new Error\ErrorCode(1),
            ],
            'empty' => [
                [
                    'text' => null,
                    'type' => null,
                ],
                2,
                new Error\ErrorCode(2),
            ],
        ];
    }
}
