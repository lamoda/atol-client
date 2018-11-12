<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\Tests\Helper;

use JMS\Serializer\Handler\HandlerRegistry;
use JMS\Serializer\JsonDeserializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\Naming\CamelCaseNamingStrategy;
use JMS\Serializer\Naming\SerializedNameAnnotationStrategy;
use Lamoda\AtolClient\Serializer\Handler\EnumHandler;
use Lamoda\AtolClient\Serializer\Handler\ExtendedDateHandler;

final class SerializerBuilder extends \JMS\Serializer\SerializerBuilder
{
    /**
     * @var SerializedNameAnnotationStrategy
     */
    private $annotationNamingStrategy;

    public function addDefaultSerializationVisitors()
    {
        parent::addDefaultSerializationVisitors();

        $this->initializeAnnotationNamingStrategy();

        $this->setSerializationVisitor(
            'atol_client',
            new JsonSerializationVisitor($this->annotationNamingStrategy)
        );

        return $this;
    }

    public function addDefaultDeserializationVisitors()
    {
        parent::addDefaultDeserializationVisitors();

        $this->initializeAnnotationNamingStrategy();

        $this->setDeserializationVisitor(
            'atol_client',
            new JsonDeserializationVisitor($this->annotationNamingStrategy)
        );

        return $this;
    }

    public function addDefaultHandlers()
    {
        parent::addDefaultHandlers();

        $this->configureHandlers(function (HandlerRegistry $handlerRegistry) {
            $handlerRegistry->registerSubscribingHandler(new EnumHandler());
            $handlerRegistry->registerSubscribingHandler(new ExtendedDateHandler());
        });

        return $this;
    }

    private function initializeAnnotationNamingStrategy(): void
    {
        if ($this->annotationNamingStrategy !== null) {
            return;
        }

        $this->annotationNamingStrategy = new SerializedNameAnnotationStrategy(
            new CamelCaseNamingStrategy()
        );
    }
}
