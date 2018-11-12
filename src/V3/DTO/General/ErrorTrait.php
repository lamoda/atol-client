<?php

namespace Lamoda\AtolClient\V3\DTO\General;

use Symfony\Component\Validator\Constraints as Assert;

trait ErrorTrait
{
    /**
     * @Serializer\Type("Lamoda\AtolClient\V3\DTO\General\Error")
     * @Assert\Valid()
     *
     * @var Error
     */
    private $error;

    /**
     * @return Error
     */
    public function getError(): ?Error
    {
        return $this->error;
    }
}
