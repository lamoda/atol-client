<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Register;

use Paillechat\Enum\Enum;

/**
 * @method static self FULL_PREPAYMENT()
 * @method static self PREPAYMENT()
 * @method static self ADVANCE()
 * @method static self FULL_PAYMENT()
 * @method static self PARTIAL_PAYMENT()
 * @method static self CREDIT()
 * @method static self CREDIT_PAYMENT()
 */
final class PaymentMethod extends Enum
{
    protected const FULL_PREPAYMENT = 'full_prepayment';
    protected const PREPAYMENT = 'prepayment';
    protected const ADVANCE = 'advance';
    protected const FULL_PAYMENT = 'full_payment';
    protected const PARTIAL_PAYMENT = 'partial_payment';
    protected const CREDIT = 'credit';
    protected const CREDIT_PAYMENT = 'credit_payment';
}
