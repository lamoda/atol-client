<?php

namespace Lamoda\AtolClient\Tests\Unit\Exception;

use Lamoda\AtolClient\Exception\AtolErrorException;
use Lamoda\AtolClient\V3\DTO\General\Error;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\Exception\AtolErrorException
 */
class AtolErrorExceptionTest extends TestCase
{
    public function testBecauseOfAtolError()
    {
        $error = $this->createMock(Error::class);
        $type = 'type';

        $error
            ->expects($this->once())
            ->method('getCode')
            ->willReturn($this->createMock(Error\ErrorCode::class));
        $error
            ->expects($this->once())
            ->method('getType')
            ->willReturn($type);

        $exception = AtolErrorException::becauseOfAtolError($error);
        $this->assertInstanceOf(AtolErrorException::class, $exception);
        $this->assertSame($type, $exception->getType());
    }
}
