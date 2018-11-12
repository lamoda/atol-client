<?php

namespace Lamoda\AtolClient\Tests\Unit\V3\DTO\General\Error;

use Lamoda\AtolClient\V3\DTO\General\Error\ErrorCode;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\V3\DTO\General\Error\ErrorCode
 */
class ErrorCodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @param int $value
     * @dataProvider dataAll
     */
    public function testGetValue(int $value)
    {
        $this->assertSame($value, (new ErrorCode($value))->getNumber());
    }

    /**
     * @param int $value
     * @param bool $isTokenSuccess
     * @dataProvider dataAll
     */
    public function testIsTokenSuccess(int $value, bool $isTokenSuccess)
    {
        $this->assertSame($isTokenSuccess, (new ErrorCode($value))->isTokenSuccess());
    }

    /**
     * @param int $value
     * @param bool $isTokenSuccess
     * @param bool $isTokenError
     * @dataProvider dataAll
     */
    public function testIsTokenError(int $value, bool $isTokenSuccess, bool $isTokenError)
    {
        $this->assertSame($isTokenError, (new ErrorCode($value))->isTokenError());
        $this->assertSame($isTokenSuccess, (new ErrorCode($value))->isTokenSuccess());
    }

    public function dataAll()
    {
        return [
            [ErrorCode::NEW_TOKEN, true, false],
            [ErrorCode::STATE_MISSING_TOKEN, false, true],
            [ErrorCode::STATE_NOT_FOUND, false, false],
            [-100500, false, false],
        ];
    }
}
