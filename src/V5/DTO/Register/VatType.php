<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use Paillechat\Enum\Enum;

/**
 * @method static self NONE()
 * @method static self VAT0()
 * @method static self VAT10()
 * @method static self VAT18()
 * @method static self VAT110()
 * @method static self VAT118()
 */
final class VatType extends Enum
{
    protected const NONE = 'none';
    protected const VAT0 = 'vat0';
    protected const VAT10 = 'vat10';
    protected const VAT18 = 'vat18';
    protected const VAT110 = 'vat110';
    protected const VAT118 = 'vat118';
}
