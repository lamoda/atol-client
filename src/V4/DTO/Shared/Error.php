<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Shared;

use JMS\Serializer\Annotation as Serializer;

final class Error
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $errorId;
    /**
     * @var int
     *
     * @Serializer\Type("int")
     */
    private $code;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $text;

    /**
     * @var ErrorType
     *
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V4\DTO\Shared\ErrorType'>")
     */
    private $type;

    public function getErrorId(): string
    {
        return $this->errorId;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getType(): ErrorType
    {
        return $this->type;
    }
}
