<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\GetToken;

use JMS\Serializer\Annotation as Serializer;

final class GetTokenRequest
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $login;
    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private $pass;

    public function __construct(string $login, string $pass)
    {
        $this->login = $login;
        $this->pass = $pass;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPass(): string
    {
        return $this->pass;
    }

    public function setPass(string $pass): self
    {
        $this->pass = $pass;

        return $this;
    }
}
