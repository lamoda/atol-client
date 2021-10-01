<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Correction;

use JMS\Serializer\Annotation as Serializer;
use Lamoda\AtolClient\V4\DTO\Register\Company;
use Lamoda\AtolClient\V4\DTO\Register\Payment;
use Lamoda\AtolClient\V4\DTO\Register\Vat;

final class Correction
{
    /**
     * @var Company
     *
     * @Serializer\Type("Lamoda\AtolClient\V4\DTO\Register\Company")
     */
    private $company;

    /**
     * @var CorrectionInfo
     *
     * @Serializer\Type("Lamoda\AtolClient\V4\DTO\Correction\CorrectionInfo")
     * @Serializer\SerializedName("correction_info")
     */
    private $correctionInfo;

    /**
     * @var Payment[]
     *
     * @Serializer\Type("array<Lamoda\AtolClient\V4\DTO\Register\Payment>")
     */
    private $payments;

    /**
     * @var Vat[]
     *
     * @Serializer\Type("array<Lamoda\AtolClient\V4\DTO\Register\Vat>")
     */
    private $vats;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $cashier;

    public function __construct(Company $company, CorrectionInfo $correctionInfo, array $payments, array $vats)
    {
        $this->company = $company;
        $this->correctionInfo = $correctionInfo;
        $this->payments = $payments;
        $this->vats = $vats;
    }

    public function getCorrectionInfo(): CorrectionInfo
    {
        return $this->correctionInfo;
    }

    public function setCorrectionInfo(CorrectionInfo $correctionInfo): self
    {
        $this->correctionInfo = $correctionInfo;

        return $this;
    }

    public function getCompany(): Company
    {
        return $this->company;
    }

    public function setCompany(Company $company): self
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * @param Payment[] $payments
     *
     * @return Correction
     */
    public function setPayments(array $payments): self
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * @return Vat[]
     */
    public function getVats(): array
    {
        return $this->vats;
    }

    /**
     * @param Vat[] $vats
     *
     * @return Correction
     */
    public function setVats(array $vats): self
    {
        $this->vats = $vats;

        return $this;
    }

    public function getCashier(): ?string
    {
        return $this->cashier;
    }

    /**
     * @param string $cashier
     *
     * @return Correction
     */
    public function setCashier(string $cashier): self
    {
        $this->cashier = $cashier;

        return $this;
    }


}
