<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Correction;

use Paillechat\Enum\Enum;

/**
 * @method static self SELF()
 * @method static self INSTRUCTION()
 */
final class CorrectionType extends Enum
{
    protected const SELF = 'self';
    protected const INSTRUCTION = 'instruction';
}
