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
 * @method static self PO_14()
 * @method static self PO_15()
 * @method static self PO_16()
 * @method static self PO_17()
 * @method static self PO_18()
 * @method static self PO_19()
 * @method static self PO_20()
 * @method static self PO_21()
 * @method static self PO_22()
 * @method static self PO_23()
 * @method static self PO_24()
 * @method static self PO_25()
 * @method static self PO_26()
 * @method static self PO_27()
 * @method static self PO_30()
 * @method static self PO_31()
 * @method static self PO_32()
 * @method static self MARK_PRODUCT()
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

    protected const PO_14 = 14;
    protected const PO_15 = 15;
    protected const PO_16 = 16;
    protected const PO_17 = 17;
    protected const PO_18 = 18;
    protected const PO_19 = 19;
    protected const PO_20 = 20;
    protected const PO_21 = 21;
    protected const PO_22 = 22;
    protected const PO_23 = 23;
    protected const PO_24 = 24;
    protected const PO_25 = 25;
    protected const PO_26 = 26;
    protected const PO_27 = 27;
    protected const PO_30 = 30;
    protected const PO_31 = 31;
    protected const PO_32 = 32;

    protected const MARK_PRODUCT = 33;
}
