<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class Vat
{
    /**
     * @var VatType
     *
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V5\DTO\Register\VatType'>")
     */
    private $type;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     */
    private $sum;

    public function __construct(VatType $type, float $sum)
    {
        $this->type = $type;
        $this->sum = $sum;
    }

    public function getType(): VatType
    {
        return $this->type;
    }

    public function setType(VatType $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSum(): float
    {
        return $this->sum;
    }

    public function setSum(float $sum): self
    {
        $this->sum = $sum;

        return $this;
    }
}
