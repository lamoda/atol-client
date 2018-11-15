<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\Validator;

use Lamoda\AtolClient\V3\Validator\EmailOrPhone;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\V3\Validator\EmailOrPhone
 */
class EmailOrPhoneTest extends \PHPUnit_Framework_TestCase
{
    public function testGetters()
    {
        $constraint = new EmailOrPhone();
        $this->assertSame($constraint->getTargets(), EmailOrPhone::CLASS_CONSTRAINT);
        $this->assertInternalType('string', $constraint->message);
    }
}
