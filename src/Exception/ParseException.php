<?php

namespace Lamoda\AtolClient\Exception;

/**
 * Exception of response / request parsing.
 */
class ParseException extends \RuntimeException
{
    const REQUEST = 1;
    const RESPONSE = 2;

    public static function becauseOfRuntimeException(\RuntimeException $exception, int $code = 0)
    {
        return new static('Deserialization failed.', $code, $exception);
    }
}
