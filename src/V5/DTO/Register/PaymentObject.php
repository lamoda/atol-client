<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use Paillechat\Enum\Enum;

/**
 * @method static self COMMODITY()
 * @method static self EXCISE()
 * @method static self JOB()
 * @method static self SERVICE()
 * @method static self GAMBLING_BET()
 * @method static self GAMBLING_PRIZE()
 * @method static self LOTTERY()
 * @method static self LOTTERY_PRIZE()
 * @method static self INTELLECTUAL_ACTIVITY()
 * @method static self PAYMENT()
 * @method static self AGENT_COMMISSION()
 * @method static self ANOTHER()
 */
final class PaymentObject extends Enum
{
    protected const COMMODITY = 1;
    protected const EXCISE = 2;
    protected const JOB = 3;
    protected const SERVICE = 4;
    protected const GAMBLING_BET = 5;
    protected const GAMBLING_PRIZE = 6;
    protected const LOTTERY = 7;
    protected const LOTTERY_PRIZE = 8;
    protected const INTELLECTUAL_ACTIVITY = 9;
    protected const PAYMENT = 10;
    protected const AGENT_COMMISSION = 11;
    protected const ANOTHER = 13;
}
