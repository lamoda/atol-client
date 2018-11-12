<?php

namespace Lamoda\AtolClient\Tests\Functional\V3;

use Closure;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ClientException;
use Lamoda\AtolClient\Exception\ParseException;
use Lamoda\AtolClient\Exception\ValidationException;
use Lamoda\AtolClient\Tests\Helper\AtolApiFactory;
use Lamoda\AtolClient\V3\AtolApi;
use Lamoda\AtolClient\V3\DTO\General\Error\ErrorCode;
use Lamoda\AtolClient\V3\DTO\Report\Response\Status;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Attributes\TaxSystem;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Item\Tax;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Receipt\Payment\PaymentType;
use Lamoda\AtolClient\V3\DTO\Sell\Request\Service;
use Lamoda\AtolClient\V3\DTO\SellRequest;
use Lamoda\AtolClient\V3\DTO\SellResponse;
use Paillechat\Enum\Exception\EnumException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;

class AtolApiTest extends TestCase
{
    /**
     * @var AtolApi
     */
    private $api;
    /**
     * @var ClientInterface | \PHPUnit_Framework_MockObject_MockObject
     */
    private $client;

    protected function setUp()
    {
        parent::setUp();

        $this->client = $this->createMock(ClientInterface::class);

        $this->api = AtolApiFactory::createV3($this->client, [], 'http://test_url', 'test_group');
    }

    /**
     * @dataProvider getRegisterProvider
     */
    public function testRegisterSuccess(Closure $register): void
    {
        $uuid = 'uuid';
        $timestamp = '31.01.2017 23:59:59';

        $this->setClientResponseText(<<<JSON
{
    "status": "done",
    "uuid": "$uuid",
    "timestamp": "$timestamp"
}
JSON
        );
        $validRequest = $this->createSellRequest();
        $response = $this->callRegister($register, $validRequest);

        $this->assertNull($response->getError());
        $this->assertSame($uuid, $response->getUuid());
        $this->assertSame($timestamp, $response->getTimestamp()->format('d.m.Y G:i:s'));
        $this->assertSame(Status::DONE, $response->getStatus()->getValue());
    }

    public function getRegisterProvider(): array
    {
        return [
            'sell' => [
                function (SellRequest $request): SellResponse {
                    return $this->api->sell($request);
                },
            ],
            'refund' => [
                function (SellRequest $request): SellResponse {
                    return $this->api->refund($request);
                },
            ],
        ];
    }

    public function testReportSuccess(): void
    {
        $uuid = 'uuid';
        $token = 'token';
        $timestamp = '31.01.2017 23:59:59';
        $total = 123;

        $this->setClientResponseText(<<<JSON
{
    "timestamp": "$timestamp",
    "status": "done",
    "uuid": "$uuid",
    "payload": {"total": $total}
}
JSON
        );
        $response = $this->api->report($uuid, $token);

        $this->assertSame($uuid, $response->getUuid());
        $this->assertSame($timestamp, $response->getTimestamp()->format('d.m.Y G:i:s'));
        $this->assertSame(Status::DONE, $response->getStatus()->getValue());
        $this->assertSame($total, $response->getPayload()->getTotal());
    }

    public function testGetTokenSuccess(): void
    {
        $token = 'token';
        $text = 'example';

        $this->setClientResponseText(<<<JSON
{
    "code": 0,
    "text": "$text",
    "token": "$token"
}
JSON
        );
        $login = 'login';
        $password = 'password';
        $response = $this->api->getToken($login, $password);

        $this->assertSame($token, $response->getToken());
        $this->assertSame($text, $response->getText());
        $this->assertSame(ErrorCode::NEW_TOKEN, $response->getCode()->getNumber());
    }

    /**
     * @dataProvider dataException
     *
     * @param string $responseText
     * @param string|null $expectException
     * @param int $expectExceptionCode
     */
    public function testRegisterException(
        Closure $register,
        string $responseText,
        string $expectException,
        int $expectExceptionCode
    ): void {
        $this->setClientResponseText($responseText);

        // Expectations:
        $this->expectException($expectException);
        $this->expectExceptionCode($expectExceptionCode);

        // Execution:
        $validRequest = $this->createSellRequest();
        $this->callRegister($register, $validRequest);
    }

    /**
     * @expectedException \GuzzleHttp\Exception\ClientException
     */
    public function testGuzzleException(): void
    {
        $this->client
            ->method('send')
            ->willThrowException($this->createMock(ClientException::class));

        $this->api->sell($this->createSellRequest());
    }

    /**
     * @dataProvider getRegisterProvider
     *
     * @expectedException \Lamoda\AtolClient\Exception\ValidationException
     * @expectedExceptionMessage Object should contain either phone or email.
     */
    public function testRegisterRequestException(Closure $register): void
    {
        $invalidRequest = $this->createSellRequest(true);
        $this->callRegister($register, $invalidRequest);
    }

    public function dataException(): array
    {
        $items = [
            'enum' => ['{"status":"what?"}', EnumException::class, 0],
            'parse' => ['not json', ParseException::class, ParseException::RESPONSE],
            'validation' => ['{}', ValidationException::class, ValidationException::RESPONSE],
        ];

        $data = [];
        foreach ($this->getRegisterProvider() as $registerName => $register) {
            foreach ($items as $itemName => $item) {
                $data["$registerName-$itemName"] = array_merge($register, $item);
            }
        }

        return $data;
    }

    /**
     * @param string $body
     *
     * @internal param ClientInterface|\PHPUnit_Framework_MockObject_MockObject $client
     */
    private function setClientResponseText(string $body): void
    {
        /* @see AtolApi::request */
        $response = $this->createMock(ResponseInterface::class);
        $this->client
            ->method('send')
            ->willReturn($response);
        $response
            ->method('getBody')
            ->willReturn($body);
    }

    private function callRegister(Closure $register, SellRequest $request): SellResponse
    {
        return $register->call($this, $request);
    }

    /**
     * Create sell request for ATOL API.
     *
     * @param bool $wrongAttributes
     * @param string $token
     *
     * @return SellRequest
     */
    private function createSellRequest(bool $wrongAttributes = false, string $token = 'token'): SellRequest
    {
        $attributes = new Attributes(
            $wrongAttributes ? null : 'email@email.ru',
            $wrongAttributes ? null : '123456789',
            new TaxSystem(TaxSystem::OSN)
        );

        return new SellRequest(
            new Service('inn', 'address'),
            new Receipt(
                [
                    new Item(
                        'name',
                        1,
                        2,
                        2,
                        new Tax(Tax::NONE),
                        0
                    ),
                ],
                2,
                [
                    new Payment(
                        2,
                        new PaymentType(PaymentType::ONLINE)
                    ),
                ],
                $attributes
            ),
            $token,
            (string) time()
        );
    }
}
