<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class ReceivePaymentsOperator
{
    /**
     * @var array
     *
     * @Serializer\Type("array")
     */
    private $phones;

    public function __construct(array $phones)
    {
        $this->phones = $phones;
    }

    public function getPhones(): array
    {
        return $this->phones;
    }

    public function setPhones(array $phones): self
    {
        $this->phones = $phones;

        return $this;
    }
}
