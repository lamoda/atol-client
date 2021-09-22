<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class MoneyTransferOperator
{
    /**
     * @var array
     *
     * @Serializer\Type("array")
     */
    private $phones;
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $name;
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $address;
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $inn;

    public function getPhones(): array
    {
        return $this->phones;
    }

    public function setPhones(array $phones): self
    {
        $this->phones = $phones;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getInn(): string
    {
        return $this->inn;
    }

    public function setInn(string $inn): self
    {
        $this->inn = $inn;

        return $this;
    }
}
