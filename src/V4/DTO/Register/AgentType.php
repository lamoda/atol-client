<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V4\DTO\Register;

use Paillechat\Enum\Enum;

/**
 * @method static self BANK_PAYING_AGENT()
 * @method static self BANK_PAYING_SUBAGENT()
 * @method static self PAYING_AGENT()
 * @method static self PAYING_SUBAGENT()
 * @method static self ATTORNEY()
 * @method static self COMMISSION_AGENT()
 * @method static self ANOTHER()
 */
final class AgentType extends Enum
{
    protected const BANK_PAYING_AGENT = 'bank_paying_agent';
    protected const BANK_PAYING_SUBAGENT = 'bank_paying_subagent';
    protected const PAYING_AGENT = 'paying_agent';
    protected const PAYING_SUBAGENT = 'paying_subagent';
    protected const ATTORNEY = 'attorney';
    protected const COMMISSION_AGENT = 'commission_agent';
    protected const ANOTHER = 'another';
}
