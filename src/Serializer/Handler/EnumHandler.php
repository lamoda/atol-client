<?php

namespace Lamoda\AtolClient\Serializer\Handler;

use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\VisitorInterface;
use Paillechat\Enum\Enum;

/**
 * Adds support of "Enum" type for JMS.
 */
class EnumHandler implements SubscribingHandlerInterface
{
    private static $formats = [
        'atol_client',
    ];

    /**
     * {@inheritdoc}
     */
    public static function getSubscribingMethods()
    {
        $methods = [];

        foreach (self::$formats as $format) {
            $methods[] = [
                'type' => 'Enum',
                'direction' => GraphNavigator::DIRECTION_DESERIALIZATION,
                'format' => $format,
                'method' => 'deserialize',
            ];

            $methods[] = [
                'type' => 'Enum',
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'format' => $format,
                'method' => 'serialize',
            ];
        }

        return $methods;
    }

    /**
     * @param VisitorInterface $visitor
     * @param mixed            $data
     * @param array            $type
     *
     * @throws \Paillechat\Enum\Exception\EnumException
     *
     * @return Enum
     */
    public function deserialize(VisitorInterface $visitor, $data, array $type)
    {
        if ($data === null) {
            return null;
        }

        // Return enum if exists:
        $class = $type['params'][0] ?? null;
        if (class_exists($class) && isset(class_parents($class)[Enum::class])) {
            return new $class($data);
        }

        throw new \LogicException('Enum class does not exist.');
    }

    /**
     * @param VisitorInterface $visitor
     * @param Enum             $enum
     * @param array            $type
     * @param Context          $context
     *
     * @throws \LogicException
     *
     * @return mixed
     */
    public function serialize(VisitorInterface $visitor, Enum $enum, array $type, Context $context)
    {
        $valueType = $type['params'][1] ?? 'string';
        switch ($valueType) {
            case 'string':
                return $visitor->visitString($enum->getValue(), $type, $context);
            case 'integer':
                return $visitor->visitInteger($enum->getValue(), $type, $context);
            default:
                throw new \LogicException('Unknown value type ');
        }
    }
}
