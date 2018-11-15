<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class Company
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $email;
    /**
     * @var Sno|null
     *
     * @Serializer\Type("Enum<'Lamoda\AtolClient\V4\DTO\Register\Sno'>")
     */
    private $sno;
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $inn;
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("payment_address")
     */
    private $paymentAddress;

    public function __construct(string $email, string $inn, string $paymentAddress)
    {
        $this->email = $email;
        $this->inn = $inn;
        $this->paymentAddress = $paymentAddress;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getSno(): ?Sno
    {
        return $this->sno;
    }

    public function setSno(?Sno $sno): self
    {
        $this->sno = $sno;

        return $this;
    }

    public function getInn(): string
    {
        return $this->inn;
    }

    public function setInn(string $inn): self
    {
        $this->inn = $inn;

        return $this;
    }

    public function getPaymentAddress(): string
    {
        return $this->paymentAddress;
    }

    public function setPaymentAddress(string $paymentAddress): self
    {
        $this->paymentAddress = $paymentAddress;

        return $this;
    }
}
