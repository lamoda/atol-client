<?php

namespace Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt;

use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item\Tax;
use JMS\Serializer\Annotation as Serializer;

/**
 * Receipt for ATOL sell request.
 *
 * @see \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt::$items
 */
class Item
{
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $name;

    /**
     * @Serializer\Type("float")
     *
     * @var float
     */
    private $price;

    /**
     * @Serializer\Type("float")
     *
     * @var float
     */
    private $quantity;

    /**
     * @Serializer\Type("float")
     *
     * @var float
     */
    private $sum;

    /**
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item\Tax'>")
     *
     * @var Tax
     */
    private $tax;

    /**
     * @Serializer\Type("float")
     *
     * @var float
     */
    private $taxsum;

    /**
     * ReceiptItem constructor.
     *
     * @param string $name
     * @param float  $price
     * @param float  $quantity
     * @param float  $sum
     * @param Tax    $tax
     * @param float  $taxsum
     */
    public function __construct(
        string $name,
        float $price,
        float $quantity,
        float $sum,
        Tax $tax,
        float $taxsum
    ) {
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
        $this->sum = $sum;
        $this->tax = $tax;
        $this->taxsum = $taxsum;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getQuantity(): float
    {
        return $this->quantity;
    }

    /**
     * @return float
     */
    public function getSum(): float
    {
        return $this->sum;
    }

    /**
     * @return Tax
     */
    public function getTax(): Tax
    {
        return $this->tax;
    }

    /**
     * @return float
     */
    public function getTaxsum(): float
    {
        return $this->taxsum;
    }
}
