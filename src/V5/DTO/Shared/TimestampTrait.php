<?php

namespace Lamoda\AtolClient\V5\DTO\Shared;

use JMS\Serializer\Annotation as Serializer;

/**
 * ATOL timestamp holder.
 * Exists in requests and responses.
 */
trait TimestampTrait
{
    /**
     * @Serializer\Type("DateTime<'d.m.Y G:i:s', 'Europe/Moscow'>")
     *
     * @var \DateTime
     */
    private $timestamp;

    /**
     * @return \DateTime
     */
    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }
}
