<?php

namespace Lamoda\AtolClient\Tests\Unit\Exception;

use Lamoda\AtolClient\Exception\TokenException;
use Lamoda\AtolClient\V3\DTO\General\Error;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\Exception\TokenException
 */
class TokenExceptionTest extends TestCase
{
    public function testBecauseException()
    {
        $other = new \RuntimeException('a', 1);
        $exception = TokenException::becauseException($other);
        $this->assertInstanceOf(TokenException::class, $exception);
        $this->assertSame($other->getCode(), $exception->getCode());
        $this->assertSame($other, $exception->getPrevious());
        $this->assertSame($other->getMessage(), $exception->getMessage());
    }

    public function testBecauseOfAtolError()
    {
        $error = $this->createMock(Error::class);
        $error
            ->expects($this->once())
            ->method('getCode')
            ->willReturn($this->createMock(Error\ErrorCode::class));
        $exception = TokenException::becauseOfAtolError($error);
        $this->assertInstanceOf(TokenException::class, $exception);
    }
}
