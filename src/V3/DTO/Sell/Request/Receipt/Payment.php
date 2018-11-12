<?php

namespace Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt;

use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment\PaymentType;
use JMS\Serializer\Annotation as Serializer;

/**
 * Payment for ATOL sell request.
 *
 * @see \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt::$payments
 */
class Payment
{
    /**
     * @Serializer\Type("float")
     *
     * @var float
     */
    private $sum;

    /**
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment\PaymentType', 'integer'>")
     *
     * @var PaymentType
     */
    private $type;

    /**
     * Payment constructor.
     *
     * @param float $sum
     * @param PaymentType $type
     */
    public function __construct(float $sum, PaymentType $type)
    {
        $this->sum = $sum;
        $this->type = $type;
    }
}
