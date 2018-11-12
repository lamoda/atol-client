<?php

namespace Lamoda\AtolClient\V3\DTO\Report\Response;

use Paillechat\Enum\Enum;

/**
 * Status of ATOL report response.
 *
 * @see \Lamoda\AtolClient\V3\DTO\ReportResponse::$status
 *
 * @method static self DONE()
 * @method static self FAIL()
 * @method static self WAIT()
 */
class Status extends Enum
{
    public const DONE = 'done';
    public const FAIL = 'fail';
    public const WAIT = 'wait';
}
