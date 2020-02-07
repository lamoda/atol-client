<?php

namespace Lamoda\AtolClient\Tests\Unit\V3;

use Lamoda\AtolClient\Converter\ObjectConverter;
use Lamoda\AtolClient\V3\AtolApi;
use Lamoda\AtolClient\V3\DTO\GetTokenResponse;
use Lamoda\AtolClient\V3\DTO\ReportResponse;
use Lamoda\AtolClient\V3\DTO\SellRequest;
use Lamoda\AtolClient\V3\DTO\SellResponse;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Psr7\Request;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\Constraint\Callback;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

/**
 * @group unit
 * @covers \Lamoda\AtolClient\V3\AtolApi
 */
class AtolApiTest extends TestCase
{
    /**
     * @var ClientInterface | \PHPUnit_Framework_MockObject_MockObject
     */
    private $client;

    /**
     * @var SerializerInterface | \PHPUnit_Framework_MockObject_MockObject
     */
    private $converter;

    /**
     * @var AtolApi
     */
    private $atolApi;

    /**
     * @var string
     */
    private $groupCode = 'groupCode';

    /**
     * @var string
     */
    private $baseUri = 'http://example.com';

    private $clientOptions = ['timeout' => 1];

    private $expectedClientOptions = [
        'timeout' => 1,
        'http_errors' => false,
    ];

    public function testGetToken()
    {
        $clientResponse = $this->createMock(ResponseInterface::class);
        $responseObject = $this->createMock(GetTokenResponse::class);

        $clientResponseBody = '{}';
        $login = 'login';
        $password = 'password';
        $clientRequest = new Request('GET', "{$this->baseUri}/v3/getToken/?login=$login&pass=$password", ['Content-Type' => 'application/json'], null);

        /* @see AtolApi::request */
        $this->client
            ->expects($this->once())
            ->method('send')
            ->with($this->sameRequestCallback($clientRequest), $this->expectedClientOptions)
            ->willReturn($clientResponse);
        $clientResponse
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($clientResponseBody);
        $this->converter
            ->expects($this->once())
            ->method('getResponseObject')
            ->with(GetTokenResponse::class, $clientResponseBody)
            ->willReturn($responseObject);

        $result = $this->atolApi->getToken($login, $password);

        $this->assertSame($responseObject, $result);
    }

    /**
     * @dataProvider dataRegister
     *
     * @param string $slug
     * @param string $method
     */
    public function testRegister(string $slug, string $method)
    {
        $request = $this->createMock(SellRequest::class);
        $clientResponse = $this->createMock(ResponseInterface::class);
        $responseObject = $this->createMock(SellResponse::class);

        $clientResponseBody = '{}';
        $requestJson = '{}';
        $token = 'token';
        $clientRequest = new Request('POST', "{$this->baseUri}/v3/{$this->groupCode}/{$slug}/?tokenid=$token", ['Content-Type' => 'application/json'], $requestJson);

        // Flow:
        /* @see AtolApi::register */
        $request
            ->expects($this->once())
            ->method('getToken')
            ->willReturn($token);

        /* @see AtolApi::parseBody */
        $this->converter
            ->expects($this->once())
            ->method('getRequestString')
            ->with($request)
            ->willReturn($requestJson);

        /* @see AtolApi::request */
        $this->client
            ->expects($this->once())
            ->method('send')
            ->with($this->sameRequestCallback($clientRequest), $this->expectedClientOptions)
            ->willReturn($clientResponse);
        $clientResponse
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($clientResponseBody);

        /* @see AtolApi::register */
        $this->converter
            ->expects($this->once())
            ->method('getResponseObject')
            ->with(SellResponse::class, $clientResponseBody)
            ->willReturn($responseObject);

        $result = $this->atolApi->$method($request);

        $this->assertSame($responseObject, $result);
    }

    /**
     * Sell and refund info for register test.
     *
     * @return array
     */
    public function dataRegister()
    {
        return [
            ['sell', 'sell'],
            ['sell_refund', 'refund'],
        ];
    }

    public function testReport()
    {
        $clientResponse = $this->createMock(ResponseInterface::class);
        $responseObject = $this->createMock(ReportResponse::class);

        $clientResponseBody = '{}';
        $groupCode = 'groupCode';
        $uuid = 'uuid';
        $token = 'token';
        $clientRequest = new Request('GET', "{$this->baseUri}/v3/$groupCode/report/$uuid/?tokenid=$token", ['Content-Type' => 'application/json'], null);

        // Flow:
        /* @see AtolApi::request */
        $this->client
            ->expects($this->once())
            ->method('send')
            ->with($this->sameRequestCallback($clientRequest), $this->expectedClientOptions)
            ->willReturn($clientResponse);
        $clientResponse
            ->expects($this->once())
            ->method('getBody')
            ->willReturn($clientResponseBody);

        /* @see AtolApi::report */
        $this->converter
            ->expects($this->once())
            ->method('getResponseObject')
            ->with(ReportResponse::class, $clientResponseBody)
            ->willReturn($responseObject);

        $result = $this->atolApi->report($uuid, $token);

        $this->assertSame($responseObject, $result);
    }

    /**
     * @expectedException \GuzzleHttp\Exception\GuzzleException
     */
    public function testResponseException()
    {
        /* @see AtolApi::request */
        $this->client
            ->expects($this->once())
            ->method('send')
            ->willThrowException($this->createMock(ConnectException::class));

        $this->atolApi->report('', '');
    }

    /**
     * {@inheritdoc}
     */
    protected function setUp()
    {
        $this->converter = $this->createMock(ObjectConverter::class);
        $this->client = $this->createMock(ClientInterface::class);
        $this->atolApi = new AtolApi($this->converter, $this->client, $this->clientOptions, $this->baseUri, $this->groupCode);
    }

    /**
     * @param $clientRequest
     *
     * @return Callback
     */
    private function sameRequestCallback(Request $clientRequest): Callback
    {
        return $this->callback(function (Request $actualRequest) use ($clientRequest) {
            $expectBodyStream = $clientRequest->getBody();
            $actualBodyStream = $actualRequest->getBody();

            // Compare body values:
            $this->assertEquals((string) $expectBodyStream, (string) $actualBodyStream);

            // Close streams as otherwise they cause different stream IDs:
            $expectBodyStream->close();
            $actualBodyStream->close();

            // Compare requests:
            $this->assertEquals($clientRequest, $actualRequest);

            return true;
        });
    }
}
