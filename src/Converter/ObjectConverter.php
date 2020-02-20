<?php

namespace Lamoda\AtolClient\Converter;

use Lamoda\AtolClient\Exception\ParseException;
use Lamoda\AtolClient\Exception\ValidationException;
use JMS\Serializer\Context;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Converts request and response from and to json.
 */
class ObjectConverter
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    public function __construct(
        SerializerInterface $serializer,
        ValidatorInterface $validator
    ) {
        $this->serializer = $serializer;
        $this->validator = $validator;
    }

    /**
     * @param string $class
     * @param string $json
     *
     * @throws ValidationException
     * @throws ParseException
     *
     * @return mixed
     */
    public function getResponseObject(string $class, string $json)
    {
        $object = $this->deserialize($class, $json);
        $this->assertValid($object, ValidationException::RESPONSE);

        return $object;
    }

    /**
     * @param mixed $object
     *
     * @throws ValidationException
     * @throws ParseException
     *
     * @return string
     */
    public function getRequestString($object): string
    {
        $this->assertValid($object, ValidationException::RESPONSE);

        return $this->serializeBodyObject($object);
    }

    /**
     * @param string $class
     * @param string $json
     *
     * @throws ParseException
     *
     * @return mixed
     */
    private function deserialize(string $class, string $json)
    {
        try {
            return $this->serializer->deserialize($json, $class, 'atol_client');
        } catch (\RuntimeException $exception) {
            throw ParseException::becauseOfRuntimeException($exception, ParseException::RESPONSE);
        }
    }

    /**
     * Assert that object is valid.
     *
     * @param mixed $object
     * @param int $code
     *
     * @throws ValidationException
     */
    private function assertValid($object, int $code = 0)
    {
        $errors = $this->validator->validate($object);
        if (count($errors)) {
            throw ValidationException::becauseOfValidationErrors($errors, $code);
        }
    }

    /**
     * @param mixed $object
     *
     * @throws ParseException
     *
     * @return string
     */
    private function serializeBodyObject($object): string
    {
        try {
            return $this->serializer->serialize($object, 'atol_client', $this->getSerializeBodyObjectContext());
        } catch (\RuntimeException $exception) {
            throw ParseException::becauseOfRuntimeException($exception, ParseException::REQUEST);
        }
    }

    /**
     * @return Context
     */
    private function getSerializeBodyObjectContext(): Context
    {
        return SerializationContext::create()->setGroups(['Default', 'post']);
    }
}
