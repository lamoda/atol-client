<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class Receipt
{
    /**
     * @var Client
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
     * @var Vat[]|null
     *
     * @Serializer\Type("array<Lamoda\AtolClient\V5\DTO\Register\Vat>")
     */
    private $vats;

    /**
     * @var float
     *
     * @Serializer\Type("float")
     */
    private $total;

    /**
     * @param Client $client
     * @param Company $company
     * @param Item[] $items
     * @param Payment[] $payments
     * @param float $total
     */
    public function __construct(Client $client, Company $company, array $items, array $payments, float $total)
    {
        $this->client = $client;
        $this->company = $company;
        $this->items = $items;
        $this->payments = $payments;
        $this->total = $total;
    }

    public function getClient(): Client
    {
        return $this->client;
    }

    public function setClient(Client $client): self
    {
        $this->client = $client;

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
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     *
     * @return Receipt
     */
    public function setItems(array $items): self
    {
        $this->items = $items;

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
     * @return Receipt
     */
    public function setPayments(array $payments): self
    {
        $this->payments = $payments;

        return $this;
    }

    /**
     * @return Vat[]|null
     */
    public function getVats(): ?array
    {
        return $this->vats;
    }

    /**
     * @param Vat[]|null $vats
     *
     * @return Receipt
     */
    public function setVats(?array $vats): self
    {
        $this->vats = $vats;

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
}
