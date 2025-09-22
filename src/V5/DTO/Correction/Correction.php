<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Correction;

use JMS\Serializer\Annotation as Serializer;
use Lamoda\AtolClient\V5\DTO\Register\Client;
use Lamoda\AtolClient\V5\DTO\Register\Company;
use Lamoda\AtolClient\V5\DTO\Register\Item;
use Lamoda\AtolClient\V5\DTO\Register\Payment;
use Lamoda\AtolClient\V5\DTO\Register\Vat;

final class Correction
{
    /**
     * @var Client|null
     *
     * @Serializer\Type("Lamoda\AtolClient\V5\DTO\Register\Client")
     */
    private $client;

    /**
     * @var Company
     *
     * @Serializer\Type("Lamoda\AtolClient\V5\DTO\Register\Company")
     */
    private $company;

    /**
     * @var CorrectionInfo
     *
     * @Serializer\Type("Lamoda\AtolClient\V5\DTO\Correction\CorrectionInfo")
     * @Serializer\SerializedName("correction_info")
     */
    private $correctionInfo;

    /**
     * @var Item[]
     *
     * @Serializer\Type("array<Lamoda\AtolClient\V5\DTO\Register\Item>")
     */
    private $items;

    /**
     * @var Payment[]
     *
     * @Serializer\Type("array<Lamoda\AtolClient\V5\DTO\Register\Payment>")
     */
    private $payments;

    /**
     * @var Vat[]
     *
     * @Serializer\Type("array<Lamoda\AtolClient\V5\DTO\Register\Vat>")
     */
    private $vats;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $cashier;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("cashier_inn")
     */
    private $cashierInn;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("additional_check_props")
     */
    private $additionalCheckProps;

    /**
     * @var AdditionalUserProps|null
     *
     * @Serializer\Type("Lamoda\AtolClient\V5\DTO\Correction\AdditionalUserProps")
     * @Serializer\SerializedName("additional_user_props")
     */
    private $additionalUserProps;

    /**
     * @var OperatingCheckProps|null
     *
     * @Serializer\Type("Lamoda\AtolClient\V5\DTO\Correction\OperatingCheckProps")
     * @Serializer\SerializedName("operating_check_props")
     */
    private $operatingCheckProps;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     */
    private $total;

    /**
     * @var int|null
     *
     * @Serializer\Type("int")
     */
    private $timezone;

    /**
     * @var bool|null
     *
     * @Serializer\Type("bool")
     */
    private $internet;

    public function __construct(Company $company, CorrectionInfo $correctionInfo, array $items, array $payments, array $vats, float $total)
    {
        $this->company = $company;
        $this->correctionInfo = $correctionInfo;
        $this->items = $items;
        $this->payments = $payments;
        $this->vats = $vats;
        $this->total = $total;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     *
     * @return Correction
     */
    public function setItems(array $items): self
    {
        $this->items = $items;

        return $this;
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

    /**
     * @return Client|null
     */
    public function getClient(): ?Client
    {
        return $this->client;
    }

    /**
     * @param Client|null $client
     */
    public function setClient(?Client $client): void
    {
        $this->client = $client;
    }

    public function getCashierInn(): ?string
    {
        return $this->cashierInn;
    }

    public function setCashierInn(?string $cashierInn): self
    {
        $this->cashierInn = $cashierInn;

        return $this;
    }

    public function getAdditionalCheckProps(): ?string
    {
        return $this->additionalCheckProps;
    }

    public function setAdditionalCheckProps(?string $additionalCheckProps): self
    {
        $this->additionalCheckProps = $additionalCheckProps;

        return $this;
    }

    public function getAdditionalUserProps(): ?AdditionalUserProps
    {
        return $this->additionalUserProps;
    }

    public function setAdditionalUserProps(?AdditionalUserProps $additionalUserProps): self
    {
        $this->additionalUserProps = $additionalUserProps;

        return $this;
    }

    public function getOperatingCheckProps(): ?OperatingCheckProps
    {
        return $this->operatingCheckProps;
    }

    public function setOperatingCheckProps(?OperatingCheckProps $operatingCheckProps): self
    {
        $this->operatingCheckProps = $operatingCheckProps;

        return $this;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getTimezone(): ?int
    {
        return $this->timezone;
    }

    public function setTimezone(?int $timezone): self
    {
        $this->timezone = $timezone;

        return $this;
    }

    public function getInternet(): ?bool
    {
        return $this->internet;
    }

    public function setInternet(?bool $internet): self
    {
        $this->internet = $internet;

        return $this;
    }

}
