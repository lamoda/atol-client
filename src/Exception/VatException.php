<?php

namespace Lamoda\AtolClient\Exception;

/**
 * Exception caused by taxes.
 */
class VatException extends \RuntimeException
{
    public static function becauseUnknownVatValue(int $value): VatException
    {
        return new self("Unknown VAT value: $value.");
    }
}
