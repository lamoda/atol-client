<?php

namespace Lamoda\AtolClient\Serializer\Handler;

use JMS\Serializer\GraphNavigatorInterface;
use JMS\Serializer\Handler\DateHandler;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\Visitor\DeserializationVisitorInterface;
use JMS\Serializer\Visitor\SerializationVisitorInterface;

/**
 * Add support of different formats for DateTime and DateInterval JMS type.
 */
class ExtendedDateHandler implements SubscribingHandlerInterface
{
    private static $additionalFormats = [
        'atol_client',
    ];

    private static $types = [
        'DateTime',
        'DateInterval',
    ];

    /** @var DateHandler there is no DI */
    private $dateHandler;

    public function __construct()
    {
        $this->dateHandler = new DateHandler();
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribingMethods()
    {
        $methods = DateHandler::getSubscribingMethods();

        foreach (self::$additionalFormats as $format) {
            $methods[] = [
                'type' => 'DateTime',
                'direction' => GraphNavigatorInterface::DIRECTION_DESERIALIZATION,
                'format' => $format,
                'method' => 'deserializeDateTimeFromJson',
            ];

            foreach (self::$types as $type) {
                $methods[] = [
                    'type' => $type,
                    'format' => $format,
                    'direction' => GraphNavigatorInterface::DIRECTION_SERIALIZATION,
                    'method' => 'serialize' . $type,
                ];
            }
        }

        return $methods;
    }

    public function serializeDateTime(SerializationVisitorInterface $visitor, \DateTime $date, array $type, SerializationContext $context)
    {
        return $this->dateHandler->serializeDateTime($visitor, $date, $type, $context);
    }

    public function serializeDateTimeImmutable(
        SerializationVisitorInterface $visitor,
        \DateTimeImmutable $date,
        array $type,
        SerializationContext $context
    ) {
        return $this->dateHandler->serializeDateTimeImmutable($visitor, $date, $type, $context);
    }

    public function serializeDateInterval(SerializationVisitorInterface $visitor, \DateInterval $date, array $type, SerializationContext $context)
    {
        return $this->dateHandler->serializeDateInterval($visitor, $date, $type, $context);
    }

    public function deserializeDateTimeFromJson(DeserializationVisitorInterface $visitor, $data, array $type): ?\DateTimeInterface
    {
        return $this->dateHandler->deserializeDateTimeFromJson($visitor, $data, $type);
    }
}
