<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\Validator;

use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes;
use Lamoda\AtolClient\V3\Validator\EmailOrPhoneValidator;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Symfony\Component\Validator\Violation\ConstraintViolationBuilderInterface;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\V3\Validator\EmailOrPhoneValidator
 */
class EmailOrPhoneValidatorTest extends TestCase
{
    public function testInvalid()
    {
        $context = $this->mockContext();
        $constraint = $this->mockConstraint();
        $violation = $this->createMock(ConstraintViolationBuilderInterface::class);
        $constraint->method('__get')->with('message')->willReturn('123');

        $context
            ->expects($this->once())
            ->method('buildViolation')
            ->with($constraint->message)
            ->willReturn($violation);
        $violation
            ->expects($this->once())
            ->method('atPath')
            ->willReturnSelf();
        $violation
            ->expects($this->once())
            ->method('addViolation');

        $validator = new EmailOrPhoneValidator();
        $validator->initialize($context);
        $validator->validate($this->mockAttributes(), $constraint);
    }

    /**
     * @dataProvider dataInvalid
     */
    public function testValid(string $method)
    {
        $attributes = $this->mockAttributes();
        $context = $this->mockContext();

        $attributes
            ->expects($this->once())
            ->method($method)
            ->willReturn('not false');
        $context
            ->expects($this->never())
            ->method('buildViolation');

        $validator = new EmailOrPhoneValidator();
        $validator->initialize($context);
        $validator->validate($attributes, $this->mockConstraint());
    }

    public function dataInvalid()
    {
        return [
            ['getEmail'],
            ['getPhone'],
        ];
    }

    /**
     * @return Attributes|MockObject
     */
    private function mockAttributes()
    {
        return $this->createMock(Attributes::class);
    }

    /**
     * @return MockObject|ExecutionContextInterface
     */
    private function mockContext()
    {
        return $this->createMock(ExecutionContextInterface::class);
    }

    /**
     * @return MockObject|Constraint
     */
    private function mockConstraint()
    {
        return $this->createMock(Constraint::class);
    }
}
