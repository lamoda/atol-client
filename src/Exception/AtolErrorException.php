<?php

namespace Lamoda\AtolClient\Exception;

use Lamoda\AtolClient\V3\DTO\General\Error;
use Throwable;

/**
 * Exception caused by ATOL error.
 */
class AtolErrorException extends \RuntimeException
{
    /**
     * @var string
     */
    private $type;

    /**
     * @param string $type
     * {@inheritdoc}
     */
    public function __construct($message = '', $code = 0, ?string $type = '', Throwable $previous = null)
    {
        $this->type = $type;
        parent::__construct($message, $code, $previous);
    }

    public static function becauseOfAtolError(Error $error)
    {
        return new static(
            $error->getText(),
            $error->getCode()->getNumber(),
            $error->getType()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getType(): string
    {
        return $this->type;
    }
}
