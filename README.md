# ATOL PHP Client bundle
ATOL API v3/v4 client for PHP

https://online.atol.ru/

## Installation

Usage is as simple as 

1. Install library
	```bash
	composer require lamoda/atol-client
	```

2. Better to use this library with symfony: https://github.com/lamoda/atol-client-bundle

3. But you can configure it manually (you will probably need some factory:
	```php
	<?php
	
	declare(strict_types=1);
	
	namespace Lamoda\AtolClient\Tests\Helper;
	
	use GuzzleHttp\ClientInterface;
	use JMS\Serializer\Serializer;
	use Lamoda\AtolClient\Converter\ObjectConverter;
	use Lamoda\AtolClient\V3\AtolApi as AtolApiV3;
	use Lamoda\AtolClient\V4\AtolApi as AtolApiV4;
	use Symfony\Component\Validator\Validation;
	use Symfony\Component\Validator\Validator\ValidatorInterface;
	
	final class AtolApiFactory
	{
    	/**
 		 * @deprecated  	
 		 */
		public static function createV3(
			ClientInterface $client,
			array $options,
			string $baseUrl,
			string $groupCode
		): AtolApiV3 {
			$objectConvertor = new ObjectConverter(
				self::createSerializer(),
				self::createValidator()
			);
	
			return new AtolApiV3(
				$objectConvertor,
				$client,
				$options,
				$baseUrl,
				$groupCode
			);
		}
	
		public static function createV4(
			ClientInterface $client,
			array $options,
			string $baseUrl
		): AtolApiV4 {
			$objectConvertor = new ObjectConverter(
				self::createSerializer(),
				self::createValidator()
			);
	
			return new AtolApiV4(
				$objectConvertor,
				$client,
				$options,
				$baseUrl
			);
		}
	
		private static function createSerializer(): Serializer
		{
			return SerializerBuilder::create()->build();
		}
	
		private static function createValidator(): ValidatorInterface
		{
			return Validation::createValidatorBuilder()
				->enableAnnotationMapping()
				->getValidator();
		}
	}
	```