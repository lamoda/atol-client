<?php

namespace Lamoda\AtolClient\V3\DTO\General;

use Lamoda\AtolClient\V3\DTO\General\Error\ErrorCodeTrait;
use JMS\Serializer\Annotation as Serializer;

/**
 * ATOL error.
 */
class Error
{
    use ErrorCodeTrait;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $text;

    /**
     * @Serializer\Type("string")
     * "system" always.
     *
     * @var string
     */
    private $type;

    /**
     * @return string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getType(): ?string
    {
        return $this->type;
    }
}
