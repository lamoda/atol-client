<?php

namespace Lamoda\AtolClient\V3\DTO;

use Lamoda\AtolClient\V3\DTO\General\TimestampTrait;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Service;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * ATOL sell request.
 *
 * @see \Lamoda\AtolClient\V3\AtolApi::register
 */
class SellRequest
{
    use TimestampTrait;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $externalId;

    /**
     * @Serializer\Type("Lamoda\AtolClient\V3\DTO\Sell\Request\Service")
     * @Assert\NotBlank()
     *
     * @var Service
     */
    private $service;

    /**
     * @Serializer\Type("Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt")
     * @Assert\NotBlank()
     * @Assert\Valid()
     *
     * @var Receipt
     */
    private $receipt;

    /**
     * @see \Lamoda\AtolClient\V3\AtolApi::getToken
     *
     * @Serializer\Type("string")
     * @Assert\NotBlank()
     *
     * @var string
     */
    private $token;

    /**
     * SellRequest constructor.
     *
     * @param Service $service
     * @param Receipt $receipt
     * @param string $token
     * @param string $externalId
     * @param \DateTime|DateTime $timestamp
     */
    public function __construct(
        Service $service,
        Receipt $receipt,
        string $token,
        string $externalId = null,
        \DateTime $timestamp = null
    ) {
        $this->externalId = $externalId;
        $this->service = $service;
        $this->receipt = $receipt;
        $this->token = $token;
        $this->timestamp = $timestamp ?: new \DateTime();
    }

    /**
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * @return Service
     */
    public function getService(): Service
    {
        return $this->service;
    }

    /**
     * @return Receipt
     */
    public function getReceipt(): Receipt
    {
        return $this->receipt;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}
