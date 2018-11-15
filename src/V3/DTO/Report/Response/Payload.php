<?php

namespace Lamoda\AtolClient\V3\DTO\Report\Response;

use JMS\Serializer\Annotation as Serializer;

/**
 * Payload in successful ATOL report response.
 *
 * @see \Lamoda\AtolClient\V3\DTO\ReportResponse::$payload
 */
class Payload
{
    /**
     * @Serializer\Type("float")
     *
     * @var float
     */
    private $total;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $fnNumber;

    /**
     * @Serializer\Type("integer")
     *
     * @var int
     */
    private $shiftNumber;

    /**
     * @Serializer\Type("DateTime<'d.m.Y G:i:s', 'Europe/Moscow'>")
     *
     * @var \DateTimeInterface
     */
    private $receiptDatetime;

    /**
     * @Serializer\Type("integer")
     *
     * @var int
     */
    private $fiscalReceiptNumber;

    /**
     * @Serializer\Type("integer")
     *
     * @var int
     */
    private $fiscalDocumentNumber;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $ecrRegistrationNumber;

    /**
     * @Serializer\Type("integer")
     *
     * @var int
     */
    private $fiscalDocumentAttribute;

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return string
     */
    public function getFnNumber(): string
    {
        return $this->fnNumber;
    }

    /**
     * @return int
     */
    public function getShiftNumber(): int
    {
        return $this->shiftNumber;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getReceiptDatetime(): \DateTimeInterface
    {
        return $this->receiptDatetime;
    }

    /**
     * @return int
     */
    public function getFiscalReceiptNumber(): int
    {
        return $this->fiscalReceiptNumber;
    }

    /**
     * @return int
     */
    public function getFiscalDocumentNumber(): int
    {
        return $this->fiscalDocumentNumber;
    }

    /**
     * @return string
     */
    public function getEcrRegistrationNumber(): string
    {
        return $this->ecrRegistrationNumber;
    }

    /**
     * @return int
     */
    public function getFiscalDocumentAttribute(): int
    {
        return $this->fiscalDocumentAttribute;
    }
}
