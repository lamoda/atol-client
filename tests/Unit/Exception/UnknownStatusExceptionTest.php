<?php

namespace Lamoda\AtolClient\Tests\Unit\Exception;

use Lamoda\AtolClient\Exception\UnknownStatusException;
use PHPUnit\Framework\TestCase;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\Exception\UnknownStatusException
 */
class UnknownStatusExceptionTest extends TestCase
{
    /**
     * @expectedException \Lamoda\AtolClient\Exception\UnknownStatusException
     */
    public function testBecauseException()
    {
        throw new UnknownStatusException();
    }
}
