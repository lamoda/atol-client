<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Register;

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
 * @method static self COMPOSITE()
 * @method static self ANOTHER()
 */
final class PaymentObject extends Enum
{
    protected const COMMODITY = 'commodity';
    protected const EXCISE = 'excise';
    protected const JOB = 'job';
    protected const SERVICE = 'service';
    protected const GAMBLING_BET = 'gambling_bet';
    protected const GAMBLING_PRIZE = 'gambling_prize';
    protected const LOTTERY = 'lottery';
    protected const LOTTERY_PRIZE = 'lottery_prize';
    protected const INTELLECTUAL_ACTIVITY = 'intellectual_activity';
    protected const PAYMENT = 'payment';
    protected const AGENT_COMMISSION = 'agent_commission';
    protected const COMPOSITE = 'composite';
    protected const ANOTHER = 'another';
}
