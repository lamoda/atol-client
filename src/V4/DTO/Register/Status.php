<?php

namespace Lamoda\AtolClient\V4\DTO\Register;

use Paillechat\Enum\Enum;

/**
 * @method static self DONE()
 * @method static self FAIL()
 * @method static self WAIT()
 */
class Status extends Enum
{
    public const FAIL = 'fail';
    public const WAIT = 'wait';
}
