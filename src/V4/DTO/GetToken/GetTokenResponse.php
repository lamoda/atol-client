<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\GetToken;

use JMS\Serializer\Annotation as Serializer;
use Lamoda\AtolClient\V4\DTO\Shared\ErrorTrait;
use Lamoda\AtolClient\V4\DTO\Shared\TimestampTrait;

final class GetTokenResponse
{
    use TimestampTrait;
    use ErrorTrait;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $token;

    public function getToken(): ?string
    {
        return $this->token;
    }
}
