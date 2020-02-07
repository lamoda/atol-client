<?php

namespace Lamoda\AtolClient\Tests\Unit\Exception;

use Lamoda\AtolClient\Exception\ParseException;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\Exception\ParseException
 */
class ParseExceptionTest extends TestCase
{
    public function testBecauseOfRuntimeException()
    {
        $previous = new \RuntimeException();
        $code = 12;
        $exception = ParseException::becauseOfRuntimeException($previous, $code);
        $this->assertInstanceOf(ParseException::class, $exception);
        $this->assertSame($code, $exception->getCode());
        $this->assertSame($previous, $exception->getPrevious());
    }
}
