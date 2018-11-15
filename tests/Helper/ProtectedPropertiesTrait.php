<?php

namespace Lamoda\AtolClient\Tests\Helper;

trait ProtectedPropertiesTrait
{
    /**
     * @see \PHPUnit_Framework_Assert::assertSame
     *
     * @param $expected
     * @param $actual
     * @param string $message
     *
     * @return mixed
     */
    abstract public static function assertSame($expected, $actual, $message = '');

    /**
     * Set values of protected properties.
     *
     * @param $object
     * @param array $values
     */
    protected function setPropertiesValues($object, array $values)
    {
        $reflection = new \ReflectionObject($object);
        foreach ($values as $key => $value) {
            $property = $reflection->getProperty($key);
            $property->setAccessible(true);
            $property->setValue($object, $value);
        }
    }

    /**
     * Get values of protected properties.
     *
     * @param $object
     * @param array $keys
     *
     * @return array
     */
    protected function getPropertiesValues($object, array $keys)
    {
        $reflection = new \ReflectionObject($object);
        $values = [];
        foreach ($keys as $key) {
            $property = $reflection->getProperty($key);
            $property->setAccessible(true);
            $values[$key] = $property->getValue($object);
        }

        return $values;
    }

    /**
     * Assert that object getters must return expected values.
     *
     * `['value' => 1]` checks `$this->assertSame(1, $object->getValue())`
     *
     * @param $object
     * @param array $expectedValues
     * @param array $boolGetters
     * @param string $message
     */
    protected function assertGettersReturnSameValues($object, array $expectedValues, array $boolGetters = [], $message = '')
    {
        foreach ($expectedValues as $key => $expected) {
            $getter = in_array($key, $boolGetters) ? $key : 'get' . ucfirst($key);
            $actual = $object->{$getter}();
            $this->assertSame($expected, $actual, "Incorrect '$key' value: " . $message);
        }
    }

    /**
     * Assert that object getters must return values from protected properties.
     *
     * @param $object
     * @param $values
     * @param array $boolGetters
     * @param string $message
     */
    protected function assertGettersReturnProtectedValues($object, $values, array $boolGetters = [], $message = '')
    {
        $this->setPropertiesValues($object, $values);
        $this->assertGettersReturnSameValues($object, $values, $boolGetters, $message);
    }

    protected function assertGettersReturnSettersValues($object, $values, array $boolGetters = [], $message = '')
    {
        $this->setSettersValues($object, $values);
        $this->assertGettersReturnSameValues($object, $values, $boolGetters, $message);
    }

    protected function setSettersValues($object, array $values)
    {
        foreach ($values as $key => $value) {
            $setter = 'set' . ucfirst($key);
            $object->{$setter}($value);
        }
    }

    protected function assertSameProperties($object, array $expectedValues)
    {
        $actualValues = $this->getPropertiesValues($object, array_keys($expectedValues));
        $this->assertSame($expectedValues, $actualValues);
    }
}
