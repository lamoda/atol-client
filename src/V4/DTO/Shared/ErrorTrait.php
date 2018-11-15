<?php

namespace Lamoda\AtolClient\V4\DTO\Shared;

use JMS\Serializer\Annotation as Serializer;

trait ErrorTrait
{
    /**
     * @Serializer\Type("Lamoda\AtolClient\V4\DTO\Shared\Error")
     *
     * @var Error|null
     */
    private $error;

    public function getError(): ?Error
    {
        return $this->error;
    }
}
