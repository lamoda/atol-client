<?php

declare(strict_types=1);

namespace Lamoda\AtolClient\V5;

use Lamoda\AtolClient\Converter\ObjectConverter;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\RequestOptions;
use Lamoda\AtolClient\V5\DTO\Correction\CorrectionRequest;
use Lamoda\AtolClient\V5\DTO\Correction\CorrectionResponse;
use Lamoda\AtolClient\V5\DTO\GetToken\GetTokenRequest;
use Lamoda\AtolClient\V5\DTO\GetToken\GetTokenResponse;
use Lamoda\AtolClient\V5\DTO\Register\RegisterRequest;
use Lamoda\AtolClient\V5\DTO\Register\RegisterResponse;
use Lamoda\AtolClient\V5\DTO\Report\ReportResponse;

final class AtolApi
{
    private const OPERATION_SELL = 'sell';
    private const OPERATION_SELL_REFUND = 'sell_refund';
    private const OPERATION_SELL_CORRECTION = 'sell_correction';
    private const OPERATION_SELL_REFUND_CORRECTION = 'sell_refund_correction';

    /**
     * @var ClientInterface
     */
    private $client;

    /**
     * @var ObjectConverter
     */
    private $converter;

    /**
     * @var string
     */
    private $baseUri;

    /**
     * @var array
     */
    private $clientOptions;

    public function __construct(
        ObjectConverter $converter,
        ClientInterface $client,
        array $clientOptions,
        string $baseUri
    ) {
        $this->converter = $converter;
        $this->client = $client;
        $this->clientOptions = $clientOptions;
        $this->baseUri = rtrim($baseUri, '/');
    }

    public function getToken(GetTokenRequest $request): GetTokenResponse
    {
        $response = $this->request('POST', 'getToken', [], $request);

        return $this->converter->getResponseObject(GetTokenResponse::class, $response);
    }

    public function sell(string $groupCode, string $token, RegisterRequest $request): RegisterResponse
    {
        return $this->register(self::OPERATION_SELL, $groupCode, $token, $request);
    }

    public function sellRefund(string $groupCode, string $token, RegisterRequest $request): RegisterResponse
    {
        return $this->register(self::OPERATION_SELL_REFUND, $groupCode, $token, $request);
    }

    public function sellCorrection(string $groupCode, string $token, CorrectionRequest $request): CorrectionResponse
    {
        return $this->correction(self::OPERATION_SELL_CORRECTION, $groupCode, $token, $request);
    }

    public function sellRefundCorrection(string $groupCode, string $token, CorrectionRequest $request): CorrectionResponse
    {
        return $this->correction(self::OPERATION_SELL_REFUND_CORRECTION, $groupCode, $token, $request);
    }

    public function report(string $groupCode, string $token, string $uuid): ReportResponse
    {
        $response = $this->request(
            'GET',
            "$groupCode/report/$uuid",
            [],
            null,
            [
                'Token' => $token,
            ]
        );

        return $this->converter->getResponseObject(ReportResponse::class, $response);
    }

    private function correction(
        string $operation,
        string $groupCode,
        string $token,
        CorrectionRequest $request
    ): CorrectionResponse {
        $response = $this->request(
            'POST',
            "$groupCode/$operation",
            [],
            $request,
            [
                'Token' => $token,
            ]
        );

        return $this->converter->getResponseObject(CorrectionResponse::class, $response);
    }

    private function register(
        string $operation,
        string $groupCode,
        string $token,
        RegisterRequest $request
    ): RegisterResponse {
        $response = $this->request(
            'POST',
            "$groupCode/$operation",
            [],
            $request,
            [
                'Token' => $token,
            ]
        );

        return $this->converter->getResponseObject(RegisterResponse::class, $response);
    }

    private function request(string $method, string $path, array $query = [], $body = null, array $headers = []): string
    {
        // Prepare request:
        $body = $this->parseBody($body);
        $path = trim($path, '/');
        $uri = "{$this->baseUri}/v5/$path/";

        $headers = array_merge($headers, [
            'Content-Type' => 'application/json',
        ]);

        $options = array_merge($this->clientOptions, [
            RequestOptions::HEADERS => $headers,
            RequestOptions::QUERY => $query,
            RequestOptions::BODY => $body,
            // configuration
            RequestOptions::HTTP_ERRORS => false,
        ]);

        $response = $this->client->request(
            $method,
            $uri,
            $options
        );

        return (string) $response->getBody();
    }

    private function parseBody($body = null): ?string
    {
        if ($body === null || \is_string($body)) {
            return $body;
        }

        return $this->converter->getRequestString($body);
    }
}
