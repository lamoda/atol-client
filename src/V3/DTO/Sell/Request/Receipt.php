<?php

namespace Lamoda\AtolClient\V3\DTO\Sell\Request;

use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Payments and items info for ATOL sell request.
 *
 * @see \Lamoda\AtolClient\V3\DTO\SellRequest::$receipt
 */
class Receipt
{
    /**
     * @Serializer\Type("array<Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item>")
     *
     * @var Item[]
     */
    private $items;

    /**
     * @Serializer\Type("float")
     *
     * @var float
     */
    private $total;

    /**
     * @Serializer\Type("array<Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment>")
     *
     * @var Payment[]
     */
    private $payments;

    /**
     * @Serializer\Type("Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes")
     * @Assert\Valid()
     *
     * @var Attributes
     */
    private $attributes;

    /**
     * @param Item[]  $items
     * @param float      $total
     * @param Payment[]  $payments
     * @param Attributes $attributes
     */
    public function __construct(
        array $items,
        float $total,
        array $payments,
        Attributes $attributes
    ) {
        $this->items = $items;
        $this->total = $total;
        $this->payments = $payments;
        $this->attributes = $attributes;
    }

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->total;
    }

    /**
     * @return Payment[]
     */
    public function getPayments(): array
    {
        return $this->payments;
    }

    /**
     * @return Attributes
     */
    public function getAttributes(): Attributes
    {
        return $this->attributes;
    }
}
