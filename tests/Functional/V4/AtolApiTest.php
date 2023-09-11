<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\Tests\Functional\V4;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Lamoda\AtolClient\Tests\Helper\AtolApiFactory;
use Lamoda\AtolClient\Tests\TestCase\V4\AtolApiTestCase;
use Lamoda\AtolClient\V4\AtolApi;

final class AtolApiTest extends AtolApiTestCase
{
    private MockHandler $mockHandler;

    /**
     * @var AtolApi
     */
    private $api;

    public function testReportResponseFields(): void
    {
        $this->appendSuccessDoneReportResponse();

        $response = $this->api->report('test', '123', '123');

        $this->assertEquals('v4-online-atol-ru_4179', $response->getGroupCode());
        $this->assertEquals('inttest-agent', $response->getDaemonCode());
        $this->assertEquals('KKT000120', $response->getDeviceCode());
        $this->assertEquals('', $response->getCallbackUrl());

        $payload = $response->getPayload();

        $this->assertNotNull($payload);

        $this->assertEquals(1000.1, $payload->getTotal());
        $this->assertEquals('www.nalog.ru', $payload->getFnsSite());
        $this->assertEquals('9999078900006211', $payload->getFnNumber());
        $this->assertEquals(173, $payload->getShiftNumber());
        $this->assertEquals(new \DateTime('2018-08-03T23:21:00+0300'), $payload->getReceiptDatetime());
        $this->assertEquals(425, $payload->getFiscalReceiptNumber());
        $this->assertEquals(132896, $payload->getFiscalDocumentNumber());
        $this->assertEquals('0000000005020922', $payload->getEcrRegistrationNumber());
        $this->assertEquals(1313456287, $payload->getFiscalDocumentAttribute());
    }

    protected function createApi(): AtolApi
    {
        $this->mockHandler = new MockHandler();

        $handlerStack = HandlerStack::create($this->mockHandler);

        $client = new Client([
            'handler' => $handlerStack,
        ]);

        $this->api = AtolApiFactory::createV4($client, [], 'http://test_atol');

        return $this->api;
    }

    protected function getLogin(): string
    {
        return 'demo';
    }

    protected function getPassword(): string
    {
        return 'demo';
    }

    protected function getGroupCode(): string
    {
        return 'test_group';
    }

    protected function setUpTestGetToken(): void
    {
        $this->appendSuccessTokenResponse();
    }

    protected function setUpTestGetTokenWithInvalidCredentials(): void
    {
        $this->appendErrorTokenResponse();
    }

    protected function setUpTestSell(): void
    {
        $this->appendSuccessTokenResponse();
        $this->appendSuccessRegisterResponse();
    }

    protected function setUpTestSellCorrection(): void
    {
        $this->appendSuccessTokenResponse();
        $this->appendSuccessCorrectionResponse();
    }

    protected function setUpTestSellWithInvalidRequest(): void
    {
        $this->appendSuccessTokenResponse();
        $this->appendErrorRegisterResponse();
    }

    protected function setUpTestSellCorrectionWithInvalidRequest(): void
    {
        $this->appendSuccessTokenResponse();
        $this->appendErrorRegisterResponse();
    }

    protected function setUpTestSellRefund(): void
    {
        $this->appendSuccessTokenResponse();
        $this->appendSuccessRegisterResponse();
    }

    protected function setUpTestSellRefundWithInvalidRequest(): void
    {
        $this->appendSuccessTokenResponse();
        $this->appendErrorRegisterResponse();
    }

    protected function setUpTestReport(): void
    {
        $this->appendSuccessTokenResponse();
        $this->appendSuccessRegisterResponse();
        $this->appendSuccessWaitingReportResponse();
        $this->appendSuccessDoneReportResponse();
    }

    private function appendSuccessTokenResponse(): void
    {
        $this->mockHandler->append(
            new Response(200, [], <<<JSON
{
  "token": "token",
  "error": null,
  "timestamp": "03.08.2018 23:15:05"
}
JSON
            )
        );
    }

    private function appendErrorTokenResponse(): void
    {
        $this->mockHandler->append(
            new Response(200, [], <<<JSON
{
  "error": {
    "error_id": "10454aec-42a2-489f-9931-58d345b08fe1",
    "code": 12,
    "text": "Неверный логин или пароль",
    "type": "system"
  },
  "timestamp": "03.08.2018 23:17:18"
}
JSON
            )
        );
    }

    private function appendSuccessRegisterResponse(): void
    {
        $this->mockHandler->append(
            new Response(200, [], <<<JSON
{
  "uuid": "1c9de7c1-3501-4d90-abf2-c78cde3ef33c",
  "status": "wait",
  "error": null,
  "timestamp": "03.08.2018 23:18:28"
}
JSON
            )
        );
    }

    private function appendSuccessCorrectionResponse(): void
    {
        $this->mockHandler->append(
            new Response(200, [], <<<JSON
{
  "uuid": "1c9de7c1-3501-4d90-abf2-c78cde3ef33c",
  "status": "wait",
  "error": null,
  "timestamp": "03.08.2018 23:18:28"
}
JSON
            )
        );
    }

    private function appendErrorRegisterResponse(): void
    {
        $this->mockHandler->append(
            new Response(200, [], <<<JSON
{
  "status": "fail",
  "error": {
    "error_id": "f215204b-e0d2-4f58-8b56-f15c756cbf7c",
    "code": 32,
    "text": "Ошибка валидации входного чека. Ошибочные поля : NumberTooSmall: #/receipt.total",
    "type": "system"
  },
  "timestamp": "03.08.2018 23:19:51"
}
JSON
            )
        );
    }

    private function appendSuccessWaitingReportResponse(): void
    {
        $this->mockHandler->append(
            new Response(200, [], <<<JSON
{
  "uuid": "3b81e0a1-d080-4472-93d8-76666f3df68f",
  "status": "wait",
  "error": {
    "error_id": "c390c3c9-495e-402f-b23f-6cab94286c2d",
    "code": 34,
    "text": "Состояние чека не найдено. Попробуйте позднее.",
    "type": "system"
  },
  "timestamp": "03.08.2018 23:22:05"
}
JSON
            )
        );
    }

    private function appendSuccessDoneReportResponse(): void
    {
        $this->mockHandler->append(
            new Response(200, [], <<<JSON
{
  "uuid": "3b81e0a1-d080-4472-93d8-76666f3df68f",
  "status": "done",
  "error": null,
  "group_code": "v4-online-atol-ru_4179",
  "daemon_code": "inttest-agent",
  "device_code": "KKT000120",
  "callback_url": "",
  "payload": {
    "total": 1000.1,
    "fns_site": "www.nalog.ru",
    "fn_number": "9999078900006211",
    "shift_number": 173,
    "receipt_datetime": "03.08.2018 23:21:00",
    "fiscal_receipt_number": 425,
    "fiscal_document_number": 132896,
    "ecr_registration_number": "0000000005020922",
    "fiscal_document_attribute": 1313456287
  },
  "timestamp": "03.08.2018 23:22:08"
}
JSON
            )
        );
    }
}
