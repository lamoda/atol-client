<?php

namespace Lamoda\AtolClient\V5\DTO\Correction;

use JMS\Serializer\Annotation as Serializer;

class SectoralCheckProps
{
    /**
     * @var FederalId
     *
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V5\DTO\Correction\FederalId'>)
     */
    private $federalId;

    /**
     * @var \DateTime
     *
     * @Serializer\Type("DateTime<'d.m.Y'>")
     */
    private $date;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $number;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $value;

    public function __construct(string $federalId, \DateTime $date, string $number, string $value)
    {
        $this->federalId = $federalId;
        $this->date = $date;
        $this->number = $number;
        $this->value = $value;
    }


    public function getFederalId(): FederalId
    {
        return $this->federalId;
    }

    public function setFederalId(FederalId $federalId): self
    {
        $this->federalId = $federalId;

        return $this;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function setNumber(string $number): self
    {
        $this->number = $number;

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
