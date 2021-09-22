<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class Client
{
    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $email;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $phone;

    public function __construct(?string $email, ?string $phone)
    {
        $this->email = $email;
        $this->phone = $phone;

        $this->assertValidity();
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        $this->assertValidity();

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;
        $this->assertValidity();

        return $this;
    }

    private function assertValidity(): void
    {
        /** @noinspection IsEmptyFunctionUsageInspection */
        if ($this->isEmpty($this->email) && $this->isEmpty($this->phone)) {
            throw new \InvalidArgumentException('Email and phone can not be empty at the same time');
        }

        $pattern = '/^\+?[0-9]{1,18}$/';
        if (!$this->isEmpty($this->phone) && !preg_match($pattern, $this->phone)) {
            throw new \InvalidArgumentException('Phone is not valid. Phone: ' . $this->phone);
        }
    }

    private function isEmpty($phoneOrEmail): bool
    {
        return empty($phoneOrEmail) || 'none' === $phoneOrEmail;
    }

}
