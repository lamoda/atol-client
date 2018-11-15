<?php

namespace Lamoda\AtolClient\V3\DTO\General\Error;

use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

trait ErrorCodeTrait
{
    /**
     * @Serializer\Type("integer")
     *
     * @Assert\NotBlank()
     *
     * @var int
     */
    private $code;

    /**
     * @return ErrorCode
     */
    public function getCode(): ErrorCode
    {
        return new ErrorCode($this->code);
    }
}
