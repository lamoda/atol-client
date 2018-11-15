<?php

namespace Lamoda\AtolClient\Exception;

use Lamoda\AtolClient\V3\DTO\General\Error;

/**
 * Problems with token.
 * It is not CashRegister exception because.
 */
class TokenException extends \RuntimeException
{
    public static function becauseException(\Exception $exception)
    {
        return new static($exception->getMessage(), $exception->getCode(), $exception);
    }

    public static function becauseOfAtolError(Error $error)
    {
        return new static($error->getText(), $error->getCode()->getNumber());
    }
}
