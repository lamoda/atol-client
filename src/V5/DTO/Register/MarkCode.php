<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5\DTO\Register;

use JMS\Serializer\Annotation as Serializer;

final class MarkCode
{
    public const UNKNOWN = 'unknown';
    public const EAN8 = 'ean8';
    public const EAN13 = 'ean13';
    public const ITF14 = 'itf14';
    public const GS1M = 'gs1m';
    public const SHORT = 'short';
    public const FUR = 'fur';
    public const EGAIS20 = 'egais20';
    public const EGAIS30 = 'egais30';

    public const VALID_FORMATS = [
        self::UNKNOWN,
        self::EAN8,
        self::EAN13,
        self::ITF14,
        self::GS1M,
        self::SHORT,
        self::FUR,
        self::EGAIS20,
        self::EGAIS30,
    ];

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $unknown;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     */
    private $ean8;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     */
    private $ean13;

    /**
     * @var int|null
     *
     * @Serializer\Type("integer")
     */
    private $itf14;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $gs1m;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $short;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $fur;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $egais20;

    /**
     * @var string|null
     *
     * @Serializer\Type("string")
     */
    private $egais30;

    /**
     * @var string
     *
     * @Serializer\Exclude()
     */
    private $format;

    public function __construct(string $value, string $format)
    {
        $this->format = $format;
        $this->$format = $value;

        $this->assertValidity();
    }

    private function isValidFormat(string $format): bool
    {
        return in_array($format, self::VALID_FORMATS);
    }

    public function getValue(): string
    {
        return $this->{$this->format};
    }

    /**
     * @return string|null
     */
    public function getUnknown(): ?string
    {
        return $this->unknown;
    }

    /**
     * @return string|null
     */
    public function getEan8(): ?string
    {
        return $this->ean8;
    }

    /**
     * @return string|null
     */
    public function getEan13(): ?string
    {
        return $this->ean13;
    }

    /**
     * @return string|null
     */
    public function getItf14(): ?string
    {
        return $this->itf14;
    }

    /**
     * @return string|null
     */
    public function getGs1m(): ?string
    {
        return $this->gs1m;
    }

    /**
     * @return string|null
     */
    public function getShort(): ?string
    {
        return $this->short;
    }

    /**
     * @return string|null
     */
    public function getFur(): ?string
    {
        return $this->fur;
    }

    /**
     * @return string|null
     */
    public function getEgais20(): ?string
    {
        return $this->egais20;
    }

    /**
     * @return string|null
     */
    public function getEgais30(): ?string
    {
        return $this->egais30;
    }

    /**
     * @throws \InvalidArgumentException
     */
    private function assertValidity(): void
    {
        if (!$this->isValidFormat($this->format) || !property_exists($this, $this->format)) {
            throw new \InvalidArgumentException('Format of mark code is not valid. Format: '
                . $this->format . '. Valid formats: ' . implode(self::VALID_FORMATS, ', '));
        }

        if (in_array($this->format, [self::EAN8, self::EAN13, self::ITF14]) && !is_numeric($this->getValue())) {
            throw new \InvalidArgumentException('Value for format ' . $this->format . ' mast be numeric. Value: ' . $this->getValue());
        }
    }

}
