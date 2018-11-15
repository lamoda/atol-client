<?php

namespace Lamoda\AtolClient\Serializer\Handler;

use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\DateHandler;

/**
 * Add support of different formats for DateTime and DateInterval JMS type.
 */
class ExtendedDateHandler extends DateHandler
{
    private static $additionalFormats = [
        'atol_client',
    ];

    private static $types = [
        'DateTime',
        'DateInterval',
    ];

    /**
     * {@inheritdoc}
     */
    public static function getSubscribingMethods()
    {
        $methods = parent::getSubscribingMethods();

        foreach (self::$additionalFormats as $format) {
            $methods[] = [
                'type' => 'DateTime',
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => $format,
                'method' => 'deserializeDateTimeFromJson',
            ];

            foreach (self::$types as $type) {
                $methods[] = [
                    'type' => $type,
                    'format' => $format,
                    'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                    'method' => 'serialize' . $type,
                ];
            }
        }

        return $methods;
    }
}
