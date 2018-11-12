<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Report;

use JMS\Serializer\Annotation as Serializer;
use Lamoda\AtolClient\V4\DTO\Shared\ErrorTrait;
use Lamoda\AtolClient\V4\DTO\Shared\TimestampTrait;

final class ReportResponse
{
    use ErrorTrait;
    use TimestampTrait;

    /**
     * @var string | null
     *
     * @Serializer\Type("string")
     */
    private $uuid;

    /**
     * @var string | null
     *
     * @Serializer\Type("string")
     */
    private $groupCode;

    /**
     * @var string | null
     *
     * @Serializer\Type("string")
     */
    private $daemonCode;

    /**
     * @var string | null
     *
     * @Serializer\Type("string")
     */
    private $deviceCode;

    /**
     * @var string | null
     *
     * @Serializer\Type("string")
     */
    private $callbackUrl;

    /**
     * @var Status
     *
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V4\DTO\Report\Status'>")
     */
    private $status;

    /**
     * @var Payload|null
     *
     * @Serializer\Type("Lamoda\AtolClient\V4\DTO\Report\Payload")
     */
    private $payload;

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getGroupCode(): ?string
    {
        return $this->groupCode;
    }

    public function getDaemonCode(): ?string
    {
        return $this->daemonCode;
    }

    public function getDeviceCode(): ?string
    {
        return $this->deviceCode;
    }

    public function getCallbackUrl(): ?string
    {
        return $this->callbackUrl;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }

    public function getPayload(): ?Payload
    {
        return $this->payload;
    }
}
