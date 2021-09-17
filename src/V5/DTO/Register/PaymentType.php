<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use Paillechat\Enum\Enum;

/**
 * @method static self CASH()
 * @method static self ELECTRONIC()
 * @method static self PREPAID()
 * @method static self POSTPAID()
 * @method static self OTHER()
 * @method static self EXTENDED_5()
 * @method static self EXTENDED_6()
 * @method static self EXTENDED_7()
 * @method static self EXTENDED_8()
 * @method static self EXTENDED_9()
 */
final class PaymentType extends Enum
{
    /** Cash - is not documented in atol! */
    protected const CASH = 0;
    protected const ELECTRONIC = 1;
    protected const PREPAID = 2;
    protected const POSTPAID = 3;
    protected const OTHER = 4;
    protected const EXTENDED_5 = 5;
    protected const EXTENDED_6 = 6;
    protected const EXTENDED_7 = 7;
    protected const EXTENDED_8 = 8;
    protected const EXTENDED_9 = 9;
}
