<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO\Sell\Request\Receipt;

use Lamoda\AtolClient\Tests\Helper\ProtectedPropertiesTrait;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes;

/**
 * @covers \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes
 * @group unit
 */
class AttributesTest extends \PHPUnit_Framework_TestCase
{
    use ProtectedPropertiesTrait;
    private $propertiesWithGetters = ['email', 'phone'];

    /**
     * @param array $values
     * @dataProvider dataGetters
     */
    public function testGetters(array $values)
    {
        $attributes = new Attributes($values['email'], $values['phone'], $values['sno']);
        $this->assertSameProperties($attributes, $values);
        $valuesWithGetters = array_intersect_key($values, array_flip($this->propertiesWithGetters));
        $this->assertGettersReturnSameValues($attributes, $valuesWithGetters);
    }

    public function dataGetters()
    {
        return [
            'fill' => [
                [
                    'email' => 'email',
                    'phone' => 'phone',
                    'sno' => new Attributes\TaxSystem(Attributes\TaxSystem::OSN),
                ],
            ],
            'null' => [
                [
                    'email' => null,
                    'phone' => null,
                    'sno' => null,
                ],
            ],
        ];
    }
}
