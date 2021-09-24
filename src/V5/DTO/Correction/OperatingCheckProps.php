<?php

namespace Lamoda\AtolClient\V5\DTO\Correction;

use JMS\Serializer\Annotation as Serializer;

class OperatingCheckProps
{
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
    private $value;

    /**
     * @var \DateTime
     *
     * @Serializer\Type("DateTime<'d.m.Y G:i:s', 'Europe/Moscow'>")
     */
    private $timestamp;

    public function __construct(string $name, string $value, \DateTime $timestamp)
    {
        $this->name = $name;
        $this->value = $value;
        $this->timestamp = $timestamp;
    }

    public function getTimestamp(): \DateTime
    {
        return $this->timestamp;
    }

    public function setTimestamp($timestamp): self
    {
        $this->timestamp = $timestamp;

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

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;

        return $this;
    }

}
