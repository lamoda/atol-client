<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Correction;

use JMS\Serializer\Annotation as Serializer;
use Lamoda\AtolClient\V4\DTO\Register\Service;
use Lamoda\AtolClient\V4\DTO\Shared\TimestampTrait;

final class CorrectionRequest
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
     * @var Correction
     *
     * @Serializer\Type("Lamoda\AtolClient\V4\DTO\Correction\Correction")
     */
    private $correction;

    public function __construct(string $externalId, Correction $correction, \DateTime $timestamp)
    {
        $this->externalId = $externalId;
        $this->correction = $correction;
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

    public function getCorrection(): Correction
    {
        return $this->correction;
    }

    public function setCorrection(Correction $correction): self
    {
        $this->correction = $correction;

        return $this;
    }

}
