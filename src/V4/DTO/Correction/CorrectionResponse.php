<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Correction;

use JMS\Serializer\Annotation as Serializer;
use Lamoda\AtolClient\V4\DTO\Register\Status;
use Lamoda\AtolClient\V4\DTO\Shared\ErrorTrait;
use Lamoda\AtolClient\V4\DTO\Shared\TimestampTrait;

final class CorrectionResponse
{
    use TimestampTrait;
    use ErrorTrait;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $uuid;

    /**
     * @var Status | null
     *
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V4\DTO\Register\Status'>")
     */
    private $status;

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function getStatus(): ?Status
    {
        return $this->status;
    }
}
