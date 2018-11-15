<?php

namespace Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes;

use Paillechat\Enum\Enum;

/**
 * Tax system for customer in ATOL sell request.
 *
 * @see \Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes::$sno
 */
class TaxSystem extends Enum
{
    /**
     * общая СН.
     */
    public const OSN = 'osn';

    /**
     * упрощенная СН (доходы).
     */
    public const USN_INCOME = 'usn_income';

    /**
     * упрощенная СН (доход минус расходы).
     */
    public const USN_INCOME_OUTCOME = 'usn_income_outcome';

    /**
     * единый налог на вмененный доход.
     */
    public const ENVD = 'envd';

    /**
     * единый сельскохозяйственный налог.
     */
    public const ESN = 'esn';

    /**
     * патентная СН.
     */
    public const PATENT = 'patent';
}
