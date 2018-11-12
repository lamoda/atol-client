<?php

namespace Lamoda\AtolClient\V3\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class EmailOrPhone extends Constraint
{
    public $message = 'Object should contain either phone or email.';

    /**
     * {@inheritdoc}
     */
    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
