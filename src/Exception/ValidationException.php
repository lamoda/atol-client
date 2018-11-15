<?php

namespace Lamoda\AtolClient\Exception;

use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\ConstraintViolationListInterface;

/**
 * Exception of ATOL request / response validation.
 */
class ValidationException extends \RuntimeException
{
    public const REQUEST = 1;
    public const RESPONSE = 2;

    public static function becauseOfValidationErrors(ConstraintViolationListInterface $errors, int $code = 0)
    {
        $reasons = self::getReasons($errors);

        return new static("Validation failed:\n$reasons", $code);
    }

    private static function getReasons(ConstraintViolationListInterface $errors): string
    {
        $reasons = [];
        /** @var ConstraintViolationInterface $error */
        foreach ($errors as $error) {
            $reasons[] = $error->getMessage();
        }

        return implode("\n", $reasons);
    }
}
