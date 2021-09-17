<?php

namespace Lamoda\AtolClient\V5\DTO\Shared;

use JMS\Serializer\Annotation as Serializer;

trait ErrorTrait
{
    /**
     * @Serializer\Type("Lamoda\AtolClient\V5\DTO\Shared\Error")
     *
     * @var Error|null
     */
    private $error;

    public function getError(): ?Error
    {
        return $this->error;
    }
}
