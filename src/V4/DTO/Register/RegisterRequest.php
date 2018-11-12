<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Register;

use JMS\Serializer\Annotation as Serializer;
use Lamoda\AtolClient\V4\DTO\Shared\TimestampTrait;

final class RegisterRequest
{
    use TimestampTrait;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("external_id")
     */
    private $externalId;

    /**
     * @var Service|null
     *
     * @Serializer\Type("Lamoda\AtolClient\V4\DTO\Register\Service")
     */
    private $service;

    /**
     * @var Receipt
     *
     * @Serializer\Type("Lamoda\AtolClient\V4\DTO\Register\Receipt")
     */
    private $receipt;

    public function __construct(string $externalId, Receipt $receipt, \DateTime $timestamp)
    {
        $this->externalId = $externalId;
        $this->receipt = $receipt;
        $this->timestamp = $timestamp;
    }

    public function setTimestamp(\DateTime $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getExternalId(): string
    {
        return $this->externalId;
    }

    public function setExternalId(string $externalId): void
    {
        $this->externalId = $externalId;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): void
    {
        $this->service = $service;
    }

    public function getReceipt(): Receipt
    {
        return $this->receipt;
    }

    public function setReceipt(Receipt $receipt): void
    {
        $this->receipt = $receipt;
    }
}
