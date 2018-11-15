<?php

namespace Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt;

use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes\TaxSystem;
use Lamoda\AtolClient\V3\Validator\EmailOrPhone;
use JMS\Serializer\Annotation as Serializer;

/**
 * Customer info for ATOL sell request.
 *
 * @see \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt::$attributes
 *
 * @EmailOrPhone()
 */
class Attributes
{
    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $email;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $phone;

    /**
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes\TaxSystem'>")
     *
     * @var TaxSystem
     */
    private $sno;

    /**
     * Attributes constructor.
     *
     * @param string    $email
     * @param string    $phone
     * @param TaxSystem $sno
     */
    public function __construct(string $email = null, string $phone = null, TaxSystem $sno = null)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->sno = $sno;
    }

    /**
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }
}
