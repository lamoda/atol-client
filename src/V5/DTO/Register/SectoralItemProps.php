<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class SectoralItemProps
{
    /**
     * @var string
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("federal_id")
     */
    private string $federalId;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private string $date;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private string $number;

    /**
     * @var string
     *
     * @Serializer\Type("string")
     */
    private string $value;

    /**
     * @param string $federalId
     * @param string $date
     * @param string $number
     * @param string $value
     */
    public function __construct(string $federalId, string $date, string $number, string $value){
        $this->federalId = $federalId;
        $this->date = $date;
        $this->number = $number;
        $this->value = $value;
    }
}
