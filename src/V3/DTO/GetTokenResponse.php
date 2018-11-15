<?php

namespace Lamoda\AtolClient\V3\DTO;

use Lamoda\AtolClient\V3\DTO\General\Error\ErrorCodeTrait;
use JMS\Serializer\Annotation as Serializer;

/**
 * Response for ATOL token request.
 *
 * @see \Lamoda\AtolClient\V3\AtolApi::getToken
 */
class GetTokenResponse
{
    use ErrorCodeTrait;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $text;

    /**
     * @Serializer\Type("string")
     *
     * @var string
     */
    private $token;

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }
}
