<?php

namespace Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item;

use Lamoda\AtolClient\Exception\VatException;
use Paillechat\Enum\Enum;

/**
 * Tax for ATOL sell receipt.
 *
 * @see \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item::$tax
 */
class Tax extends Enum
{
    /**
     * без НДС
     */
    public const NONE = 'none';

    /**
     * НДС по ставке 0%.
     */
    public const VAT0 = 'vat0';

    /**
     * НДС чека по ставке 10%.
     */
    public const VAT10 = 'vat10';

    /**
     * НДС чека по ставке 18%.
     */
    public const VAT18 = 'vat18';

    /**
     * НДС чека по расчетной ставке 10/110.
     */
    public const VAT110 = 'vat110';

    /**
     * НДС чека по расчетной ставке 18/118.
     */
    public const VAT118 = 'vat118';

    /**
     * Get tax by integer value.
     *
     * @param int|null $vat
     *
     * @return Tax
     */
    public static function fromInteger(int $vat = null): Tax
    {
        $mapping = [
            0 => self::VAT0,
            10 => self::VAT110,
            18 => self::VAT118,
        ];

        if (null === $vat) {
            return new self(self::NONE);
        }

        if (!isset($mapping[$vat])) {
            throw VatException::becauseUnknownVatValue($vat);
        }

        return new self($mapping[$vat]);
    }
}
