<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class PayingAgent
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $operation;

    /**
     * @var array
     *
     * @Serializer\Type("array")
     */
    private $phones;

    public function __construct(string $operation, array $phones)
    {
        $this->operation = $operation;
        $this->phones = $phones;
    }

    public function getOperation(): string
    {
        return $this->operation;
    }

    public function setOperation(string $operation): self
    {
        $this->operation = $operation;

        return $this;
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
