<?php

namespace Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment;

use Paillechat\Enum\Enum;

/**
 * How you payed. In ATOL sell request.
 *
 * @see \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment::$type
 */
class PaymentType extends Enum
{
    /**
     * Cash (not for e-commerce).
     */
    public const CASH = 0;

    /**
     * Online payment.
     */
    public const ONLINE = 1;

    /**
     * Pre-payment (debit).
     */
    public const PRE = 2;

    /**
     * Post-payment (credit).
     */
    public const POST = 3;

    /**
     * Other (conteroffer).
     */
    public const OTHER = 4;

    /**
     * Extended type A.
     * Each fiscal type may have extended type.
     */
    public const EXTENDED_A = 5;

    /**
     * Extended type B.
     * Each fiscal type may have extended type.
     */
    public const EXTENDED_B = 9;
}
