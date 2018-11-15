<?php

namespace Lamoda\AtolClient\V3\DTO\General\Error;

/**
 * Error numbers enum but with possible random ATOL numbers :).
 */
class ErrorCode
{
    // Get token.
    public const NEW_TOKEN = 0;
    public const OLD_TOKEN = 1;
    public const AUTH_BAD_REQUEST = 17;
    public const AUTH_GEN_TOKEN = 18;
    public const AUTH_WRONG_USER_OR_PASSWORD = 19;

    // Sell.
    public const PARSE_ERROR = 1;
    public const INCOMING_BAD_REQUEST = 2;
    public const INCOMING_OPERATION_NOT_SUPPORT = 3;
    public const INCOMING_MISSING_TOKEN = 4;
    public const INCOMING_NOT_EXIST_TOKEN = 5;
    public const INCOMING_EXPIRED_TOKEN = 6;
    public const INCOMING_EXIST_EXTERNAL_ID = 10;

    // Report.
    public const INCOMING_QUEUE_TIMEOUT = 7;
    public const INCOMING_VALIDATION_EXCEPTION = 8;
    public const INCOMING_QUEUE_EXCEPTION = 9;
    public const STATE_BAD_REQUEST = 11;
    public const STATE_MISSING_TOKEN = 12;
    public const STATE_NOT_EXIST_TOKEN = 13;
    public const STATE_EXPIRED_TOKEN = 14;
    public const STATE_MISSING_UUID = 15;
    public const STATE_NOT_FOUND = 16;

    /**
     * @var int
     */
    private $number;

    /**
     * @param int|null $number
     */
    public function __construct(int $number)
    {
        $this->number = $number;
    }

    public function getNumber(): int
    {
        return $this->number;
    }

    /**
     * @return bool
     */
    public function isTokenSuccess(): bool
    {
        return in_array($this->getNumber(), [
            self::NEW_TOKEN,
            self::OLD_TOKEN,
        ]);
    }

    /**
     * @return bool
     */
    public function isTokenError(): bool
    {
        return in_array($this->getNumber(), [
            self::INCOMING_MISSING_TOKEN,
            self::INCOMING_NOT_EXIST_TOKEN,
            self::INCOMING_EXPIRED_TOKEN,
            self::STATE_MISSING_TOKEN,
            self::STATE_NOT_EXIST_TOKEN,
            self::STATE_EXPIRED_TOKEN,
        ]);
    }
}
