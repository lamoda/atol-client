<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

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
