<?php

namespace Lamoda\AtolClient\V3\DTO\Sell\Response;

use Paillechat\Enum\Enum;

/**
 * ATOL sell response status.
 *
 * @see \Lamoda\AtolClient\V3\DTO\SellResponse::$status
 */
class Status extends Enum
{
    public const DONE = 'done';
    public const FAIL = 'fail';
    public const WAIT = 'wait';
}
