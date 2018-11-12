<?php

namespace Lamoda\AtolClient\Tests\Unit\Exception;

use Lamoda\AtolClient\Exception\VatException;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\Exception\VatException
 */
class VatExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testBecauseOfValidationErrors()
    {
        $type = 12345;
        $exception = VatException::becauseUnknownVatValue($type);
        $this->assertInstanceOf(VatException::class, $exception);
        $this->assertContains((string) $type, $exception->getMessage());
    }
}
