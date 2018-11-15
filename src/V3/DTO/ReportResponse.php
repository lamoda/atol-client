<?php

namespace Lamoda\AtolClient\V3\DTO;

use Lamoda\AtolClient\V3\DTO\General\ErrorTrait;
use Lamoda\AtolClient\V3\DTO\General\TimestampTrait;
use Lamoda\AtolClient\V3\DTO\Report\Response\Payload;
use Lamoda\AtolClient\V3\DTO\Report\Response\Status;
use JMS\Serializer\Annotation as Serializer;

/**
 * Response for: @see \Lamoda\AtolClient\V3\AtolApi::report.
 */
class ReportResponse
{
    use TimestampTrait;
    use ErrorTrait;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $uuid;

    /**
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V3\DTO\Report\Response\Status'>")
     *
     * @var Status
     */
    private $status;

    /**
     * @Serializer\Type("Lamoda\AtolClient\V3\DTO\Report\Response\Payload")
     *
     * @var Payload
     */
    private $payload;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $callbackUrl;

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status;
    }

    /**
     * @return Payload
     */
    public function getPayload(): Payload
    {
        return $this->payload;
    }

    /**
     * @return string
     */
    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }
}
