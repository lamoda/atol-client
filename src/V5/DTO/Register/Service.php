<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class Service
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("callback_url")
     */
    private $callbackUrl;

    public function __construct(string $callbackUrl)
    {
        $this->callbackUrl = $callbackUrl;
    }

    public function getCallbackUrl(): string
    {
        return $this->callbackUrl;
    }

    public function setCallbackUrl(string $callbackUrl): self
    {
        $this->callbackUrl = $callbackUrl;

        return $this;
    }
}
