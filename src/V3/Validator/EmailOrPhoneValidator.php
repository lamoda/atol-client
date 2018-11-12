<?php

namespace Lamoda\AtolClient\V3\Validator;

use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class EmailOrPhoneValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     *
     * @param Attributes $attributes
     * @param EmailOrPhone $constraint
     */
    public function validate($attributes, Constraint $constraint)
    {
        if ($attributes->getEmail() || $attributes->getPhone()) {
            return;
        }

        $this->context
            ->buildViolation($constraint->message)
            ->atPath('phone / email')
            ->addViolation();
    }
}
