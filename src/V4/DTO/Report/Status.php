<?php

namespace Lamoda\AtolClient\V4\DTO\Report;

use Paillechat\Enum\Enum;

/**
 * @method static DONE(): self
 * @method static FAIL(): self
 * @method static WAIT(): self
 */
class Status extends Enum
{
    public const DONE = 'done';
    public const FAIL = 'fail';
    public const WAIT = 'wait';
}
