<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\Tests\TestCase\V5;

use Lamoda\AtolClient\V5\DTO\Correction\Correction;
use Lamoda\AtolClient\V5\DTO\Correction\CorrectionInfo;
use Lamoda\AtolClient\V5\DTO\Correction\CorrectionRequest;
use Lamoda\AtolClient\V5\DTO\Correction\CorrectionType;
use Lamoda\AtolClient\V5\AtolApi;
use Lamoda\AtolClient\V5\DTO\GetToken\GetTokenRequest;
use Lamoda\AtolClient\V5\DTO\Register\AgentInfo;
use Lamoda\AtolClient\V5\DTO\Register\AgentType;
use Lamoda\AtolClient\V5\DTO\Register\Client as ClientDto;
use Lamoda\AtolClient\V5\DTO\Register\Company;
use Lamoda\AtolClient\V5\DTO\Register\Item;
use Lamoda\AtolClient\V5\DTO\Register\MarkCode;
use Lamoda\AtolClient\V5\DTO\Register\Measure;
use Lamoda\AtolClient\V5\DTO\Register\PayingAgent;
use Lamoda\AtolClient\V5\DTO\Register\Payment;
use Lamoda\AtolClient\V5\DTO\Register\PaymentMethod;
use Lamoda\AtolClient\V5\DTO\Register\PaymentObject;
use Lamoda\AtolClient\V5\DTO\Register\PaymentType;
use Lamoda\AtolClient\V5\DTO\Register\Receipt;
use Lamoda\AtolClient\V5\DTO\Register\ReceivePaymentsOperator;
use Lamoda\AtolClient\V5\DTO\Register\RegisterRequest;
use Lamoda\AtolClient\V5\DTO\Register\Sno;
use Lamoda\AtolClient\V5\DTO\Register\Status as RegisterStatus;
use Lamoda\AtolClient\V5\DTO\Register\SupplierInfo;
use Lamoda\AtolClient\V5\DTO\Register\Vat;
use Lamoda\AtolClient\V5\DTO\Register\VatType;
use Lamoda\AtolClient\V5\DTO\Report\Status;
use Lamoda\AtolClient\V5\DTO\Shared\ErrorType;
use PHPUnit\Framework\TestCase;

abstract class AtolApiTestCase extends TestCase
{
    private AtolApi $api;

    abstract protected function createApi(): AtolApi;

    abstract protected function getLogin(): string;

    abstract protected function getPassword(): string;

    abstract protected function getGroupCode(): string;

    abstract protected function setUpTestGetToken(): void;

    abstract protected function setUpTestGetTokenWithInvalidCredentials(): void;

    abstract protected function setUpTestSell(): void;

    abstract protected function setUpTestSellWithInvalidRequest(): void;

    abstract protected function setUpTestSellCorrection(): void;

    abstract protected function setUpTestSellCorrectionWithInvalidRequest(): void;

    abstract protected function setUpTestSellRefund(): void;

    abstract protected function setUpTestSellRefundWithInvalidRequest(): void;

    abstract protected function setUpTestReport(): void;

    protected function setUp(): void
    {
        parent::setUp();

        $this->api = $this->createApi();
    }

    final public function testGetToken(): void
    {
        $this->setUpTestGetToken();

        $request = new GetTokenRequest(
            $this->getLogin(),
            $this->getPassword()
        );

        $response = $this->api->getToken($request);

        $this->assertNotNull($response->getToken());
        $this->assertNull($response->getError());
    }

    final public function testGetTokenWithInvalidCredentials(): void
    {
        $this->setUpTestGetTokenWithInvalidCredentials();

        $login = 'invalid';
        $password = 'invalid';

        $request = new GetTokenRequest(
            $login,
            $password
        );

        $response = $this->api->getToken($request);

        $this->assertNull($response->getToken());
        $this->assertNotNull($response->getError());

        $error = $response->getError();

        $this->assertEquals(ErrorType::SYSTEM(), $error->getType());
        $this->assertEquals(12, $error->getCode());
        $this->assertEquals('Неверный логин или пароль', $error->getText());
    }

    final public function testSell(): void
    {
        $this->setUpTestSell();

        $token = $this->requestToken();

        $request = $this->createRegisterRequest();

        $response = $this->api->sell($this->getGroupCode(), $token, $request);

        $this->assertNull($response->getError());
        $this->assertNotNull($response->getUuid());
        $this->assertInstanceOf(\DateTimeInterface::class, $response->getTimestamp());
        $this->assertEquals(RegisterStatus::WAIT(), $response->getStatus());
    }

    final public function testSellWithInvalidRequest(): void
    {
        $this->setUpTestSellWithInvalidRequest();

        $token = $this->requestToken();

        $request = $this->createInvalidRegisterRequest();

        $response = $this->api->sell($this->getGroupCode(), $token, $request);

        $this->assertNotNull($response->getError());
        $this->assertNull($response->getUuid());
        $this->assertInstanceOf(\DateTimeInterface::class, $response->getTimestamp());
        $this->assertEquals(RegisterStatus::FAIL(), $response->getStatus());

        $error = $response->getError();

        $this->assertEquals(32, $error->getCode());
    }

    final public function testSellCorrection(): void
    {
        $this->setUpTestSellCorrection();

        $token = $this->requestToken();

        $request = $this->createSellCorrectionRequest();

        $response = $this->api->sellCorrection($this->getGroupCode(), $token, $request);

        $this->assertNull($response->getError());
        $this->assertNotNull($response->getUuid());
        $this->assertInstanceOf(\DateTimeInterface::class, $response->getTimestamp());
        $this->assertEquals(RegisterStatus::WAIT(), $response->getStatus());
    }

    final public function testSellCorrectionWithInvalidRequest(): void
    {
        $this->setUpTestSellCorrectionWithInvalidRequest();

        $token = $this->requestToken();

        $request = $this->createInvalidSellCorrectionRequest();

        $response = $this->api->sellCorrection($this->getGroupCode(), $token, $request);

        $this->assertNotNull($response->getError());
        $this->assertNull($response->getUuid());
        $this->assertInstanceOf(\DateTimeInterface::class, $response->getTimestamp());
        $this->assertEquals(RegisterStatus::FAIL(), $response->getStatus());

        $error = $response->getError();

        $this->assertEquals(32, $error->getCode());
    }

    final public function testSellRefund(): void
    {
        $this->setUpTestSellRefund();

        $token = $this->requestToken();

        $request = $this->createRegisterRequest();

        $response = $this->api->sellRefund($this->getGroupCode(), $token, $request);

        $this->assertNull($response->getError());
        $this->assertNotNull($response->getUuid());
        $this->assertInstanceOf(\DateTimeInterface::class, $response->getTimestamp());
    }

    final public function testSellRefundWithInvalidRequest(): void
    {
        $this->setUpTestSellRefundWithInvalidRequest();

        $token = $this->requestToken();

        $request = $this->createInvalidRegisterRequest();

        $response = $this->api->sellRefund($this->getGroupCode(), $token, $request);

        $this->assertNotNull($response->getError());
        $this->assertNull($response->getUuid());
        $this->assertInstanceOf(\DateTimeInterface::class, $response->getTimestamp());

        $error = $response->getError();

        $this->assertEquals(32, $error->getCode());
    }

    final public function testReport(): void
    {
        $this->setUpTestReport();

        $token = $this->requestToken();

        $request = $this->createRegisterRequest();

        $registerResponse = $this->api->sell($this->getGroupCode(), $token, $request);

        $timeout = 700;

        $start = time();
        while (time() - $start < $timeout) {
            $response = $this->api->report($this->getGroupCode(), $token, $registerResponse->getUuid());

            if ($response->getStatus() == Status::DONE()) {
                $payload = $response->getPayload();
                $this->assertNotNull($payload);

                return;
            }

            if ($response->getStatus() == Status::WAIT()) {
                $error = $response->getError();
                $this->assertNotNull($error);

                $this->assertEquals(34, $error->getCode());

                sleep(1);
            }

            if ($response->getStatus() == Status::FAIL()) {
                $error = $response->getError();
                $errorText = null;
                if (null !== $error) {
                    $errorText = $error->getText();
                }

                $this->fail('Fiscal document is failed: ' . $errorText);
            }
        }

        $this->fail('Fiscal document was not moved to done state before timeout');
    }

    private function requestToken(): string
    {
        $request = new GetTokenRequest(
            $this->getLogin(),
            $this->getPassword()
        );

        $response = $this->api->getToken($request);

        $this->assertNotNull($response->getToken());
        $this->assertNull($response->getError());

        return $response->getToken();
    }

    private function createRegisterRequest(): RegisterRequest
    {
        return new RegisterRequest(
            'test-' . md5((string) microtime(true)),
            new Receipt(
                new ClientDto(
                    'test',
                    'none'
                ),
                new Company(
                    'test@test.ru',
                    '5544332219',
                    'https://v5.online.atol.ru',
                    Sno::OSN()
                ),
                [
                    (new Item(
                        'Test item',
                        1000.1,
                        1,
                        1000.1,
                        PaymentMethod::FULL_PAYMENT(),
                        new Vat(
                            VatType::VAT120(),
                            166.68
                        ),
                        Measure::PIECE(),
                        PaymentObject::PAYMENT()
                    ))
                        ->setAgentInfo(
                            (new AgentInfo(AgentType::PAYING_AGENT()))
                                ->setPayingAgent(new PayingAgent(
                                    'test',
                                    ['+79101234567']
                                ))
                                ->setReceivePaymentsOperator(new ReceivePaymentsOperator(
                                    ['+79101234567']
                                ))
                        )
                        ->setSupplierInfo(
                            new SupplierInfo(
                                ['+79101234567'],
                                'Test supplier',
                                '7705935687'
                            )
                        )
                        ->setMarkCode(new MarkCode(base64_encode('test_mark_code'), MarkCode::GS1M)),
                ],
                [
                    new Payment(
                        PaymentType::ELECTRONIC(),
                        1000.1
                    ),
                ],
                1000.1
            ),
            new \DateTime()
        );
    }

    private function createInvalidRegisterRequest(): RegisterRequest
    {
        return new RegisterRequest(
            'test-' . md5((string) microtime(true)),
            new Receipt(
                new ClientDto(
                    'test@test.ru',
                    null
                ),
                new Company(
                    'test@test.ru',
                    '5544332219',
                    'https://v5.online.atol.ru',
                    Sno::OSN()
                ),
                [
                    new Item(
                        'Test item',
                        1000.1,
                        1,
                        1000.1,
                        PaymentMethod::FULL_PAYMENT(),
                        new Vat(
                            VatType::VAT120(),
                            166.68
                        ),
                        Measure::PIECE(),
                        PaymentObject::COMMODITY()
                    ),
                ],
                [
                    new Payment(
                        PaymentType::ELECTRONIC(),
                        1000.1
                    ),
                ],
                -1000.1
            ),
            new \DateTime()
        );
    }

    private function createSellCorrectionRequest(): CorrectionRequest
    {
        return new CorrectionRequest(
            'test-' . md5((string) microtime(true)),
            new Correction(
                new Company(
                    'test@test.ru',
                    '5544332219',
                    'https://v4.online.atol.ru',
                    Sno::OSN()
                ),
                (new CorrectionInfo(
                    CorrectionType::SELF()
                )),
                [
                    new Item(
                        'Test item',
                        1000.1,
                        1,
                        1000.1,
                        PaymentMethod::FULL_PAYMENT(),
                        new Vat(
                            VatType::VAT120(),
                            166.68
                        ),
                        Measure::PIECE(),
                        PaymentObject::COMMODITY()
                    ),
                ],
                [
                    new Payment(
                        PaymentType::ELECTRONIC(),
                        1000.1
                    ),
                ],
                [new Vat(
                    VatType::VAT120(),
                    166.68
                )],
                1000.1
            ),
            new \DateTime()
        );
    }

    private function createInvalidSellCorrectionRequest(): CorrectionRequest
    {
        $r = $this->createSellCorrectionRequest();
        $correction = $r->getCorrection()->setVats([]);

        return $r->setCorrection($correction);
    }

}
