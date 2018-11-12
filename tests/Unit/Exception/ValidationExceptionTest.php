<?php

namespace Lamoda\AtolClient\Tests\Unit\Exception;

use Lamoda\AtolClient\Exception\ValidationException;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\Exception\ValidationException
 */
class ValidationExceptionTest extends \PHPUnit_Framework_TestCase
{
    public function testBecauseOfValidationErrors()
    {
        $reasonMessage = 'hello';
        $code = 12;
        $error = $this->createMock(ConstraintViolationInterface::class);
        $errors = new ConstraintViolationList([$error]);

        $error
            ->expects($this->once())
            ->method('getMessage')
            ->willReturn($reasonMessage);

        $exception = ValidationException::becauseOfValidationErrors($errors, $code);
        $this->assertInstanceOf(ValidationException::class, $exception);
        $this->assertContains($reasonMessage, $exception->getMessage());
    }
}
