<?php

namespace Lamoda\AtolClient\V5\DTO\Report;

use JMS\Serializer\Annotation as Serializer;

class Payload
{
    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $fiscalReceiptNumber;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $shiftNumber;

    /**
     * @var \DateTimeInterface
     *
     * @Serializer\Type("DateTime<'d.m.Y G:i:s', 'Europe/Moscow'>")
     */
    private $receiptDatetime;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     */
    private $total;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $fnNumber;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $ecrRegistrationNumber;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $fiscalDocumentNumber;

    /**
     * @var int
     *
     * @Serializer\Type("integer")
     */
    private $fiscalDocumentAttribute;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $fnsSite;

    public function getTotal(): float
    {
        return $this->total;
    }

    public function getFnNumber(): string
    {
        return $this->fnNumber;
    }

    public function getShiftNumber(): int
    {
        return $this->shiftNumber;
    }

    public function getReceiptDatetime(): \DateTimeInterface
    {
        return $this->receiptDatetime;
    }

    public function getFiscalReceiptNumber(): int
    {
        return $this->fiscalReceiptNumber;
    }

    public function getFiscalDocumentNumber(): int
    {
        return $this->fiscalDocumentNumber;
    }

    public function getEcrRegistrationNumber(): string
    {
        return $this->ecrRegistrationNumber;
    }

    public function getFiscalDocumentAttribute(): int
    {
        return $this->fiscalDocumentAttribute;
    }

    public function getFnsSite(): string
    {
        return $this->fnsSite;
    }
}
