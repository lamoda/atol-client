<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class Payment
{
    /**
     * @var PaymentType
     *
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V4\DTO\Register\PaymentType', 'integer'>")
     */
    private $type;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     */
    private $sum;

    public function __construct(PaymentType $type, float $sum)
    {
        $this->type = $type;
        $this->sum = $sum;
    }

    public function getType(): PaymentType
    {
        return $this->type;
    }

    public function setType(PaymentType $type): self
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
