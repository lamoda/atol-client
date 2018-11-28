<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\Tests\Integrational\V4;

use GuzzleHttp\Client;
use Lamoda\AtolClient\Tests\Helper\AtolApiFactory;
use Lamoda\AtolClient\Tests\TestCase\V4\AtolApiTestCase;
use Lamoda\AtolClient\V4\AtolApi;

final class AtolApiTest extends AtolApiTestCase
{
    /**
     * @var string
     */
    private $login;
    /**
     * @var string
     */
    private $password;
    /**
     * @var string
     */
    private $groupCode;

    protected function setUp()
    {
        parent::setUp();

        $this->login = getenv('ATOL_API_TEST_ATOL_LOGIN');
        $this->password = getenv('ATOL_API_TEST_ATOL_PASSWORD');
        $this->groupCode = getenv('ATOL_API_TEST_ATOL_GROUP_CODE');

        if (
            empty($this->login)
            || empty($this->password)
            || empty($this->groupCode)
        ) {
            $this->markTestSkipped(
                'Envs ATOL_API_TEST_ATOL_LOGIN, ' .
                'ATOL_API_TEST_ATOL_PASSWORD and ' .
                'ATOL_API_TEST_ATOL_GROUP_CODE must be defined'
            );
        }
    }

    protected function createApi(): AtolApi
    {
        $client = new Client();

        return AtolApiFactory::createV4($client, [], 'https://testonline.atol.ru/possystem/');
    }

    protected function getLogin(): string
    {
        return $this->login;
    }

    protected function getPassword(): string
    {
        return $this->password;
    }

    protected function getGroupCode(): string
    {
        return $this->groupCode;
    }

    protected function setUpTestGetToken(): void
    {
        // nothing
    }

    protected function setUpTestGetTokenWithInvalidCredentials(): void
    {
        // nothing
    }

    protected function setUpTestSell(): void
    {
        // nothing
    }

    protected function setUpTestSellWithInvalidRequest(): void
    {
        // nothing
    }

    protected function setUpTestSellRefund(): void
    {
        // nothing
    }

    protected function setUpTestSellRefundWithInvalidRequest(): void
    {
        // nothing
    }

    protected function setUpTestReport(): void
    {
        // nothing
    }
}
