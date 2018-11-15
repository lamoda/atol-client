<?php

namespace Lamoda\AtolClient\Tests\Unit\Exception;

use Lamoda\AtolClient\Exception\UnknownStatusException;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\Exception\UnknownStatusException
 */
class UnknownStatusExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @expectedException \Lamoda\AtolClient\Exception\UnknownStatusException
     */
    public function testBecauseException()
    {
        throw new UnknownStatusException();
    }
}
