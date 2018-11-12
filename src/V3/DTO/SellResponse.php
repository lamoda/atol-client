<?php

namespace Lamoda\AtolClient\V3\DTO;

use Lamoda\AtolClient\V3\DTO\General\ErrorTrait;
use Lamoda\AtolClient\V3\DTO\General\TimestampTrait;
use Lamoda\AtolClient\V3\DTO\Sell\Response\Status;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * ATOL sell response.
 *
 * @see \Lamoda\AtolClient\V3\AtolApi::register.
 */
class SellResponse
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
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V3\DTO\Sell\Response\Status'>")
     * @Assert\NotBlank()
     *
     * @var Status
     */
    private $status;

    /**
     * @return string
     */
    public function getUuid(): ?string
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
}
