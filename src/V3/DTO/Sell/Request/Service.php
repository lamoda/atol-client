<?php

namespace Lamoda\AtolClient\V3\DTO\Sell\Request;

use JMS\Serializer\Annotation as Serializer;

/**
 * ATOL sell service info for request.
 *
 * @see \Lamoda\AtolClient\V3\DTO\SellRequest::$service
 */
class Service
{
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $inn;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $callbackUrl;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $paymentAddress;

    /**
     * Service constructor.
     *
     * @param string $inn
     * @param string $paymentAddress
     * @param string $callbackUrl
     */
    public function __construct(string $inn = null, string $paymentAddress = null, string $callbackUrl = null)
    {
        $this->inn = $inn;
        $this->callbackUrl = $callbackUrl;
        $this->paymentAddress = $paymentAddress;
    }
}
