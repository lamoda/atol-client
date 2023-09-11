<?php

namespace Lamoda\AtolClient\V3;

use GuzzleHttp\Psr7\Query;
use Lamoda\AtolClient\Converter\ObjectConverter;
use Lamoda\AtolClient\Exception\ParseException;
use Lamoda\AtolClient\Exception\ValidationException;
use Lamoda\AtolClient\V3\DTO\GetTokenResponse;
use Lamoda\AtolClient\V3\DTO\ReportResponse;
use Lamoda\AtolClient\V3\DTO\SellRequest;
use Lamoda\AtolClient\V3\DTO\SellResponse;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * API to interact with ATOL.
 *
 * @see http://atol.online/
 */
class AtolApi
{
    const OPERATION_SELL = 'sell';
    const OPERATION_REFUND = 'sell_refund';

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
     * @var string
     */
    private $groupCode;

    /**
     * @var array
     */
    private $clientOptions;

    public function __construct(
        ObjectConverter $converter,
        ClientInterface $client,
        array $clientOptions,
        string $baseUri,
        string $groupCode
    ) {
        $this->converter = $converter;
        $this->client = $client;
        $this->clientOptions = $clientOptions;
        $this->baseUri = rtrim($baseUri, '/');
        $this->groupCode = $groupCode;
    }

    /**
     * Get auth token.
     *
     * @param string $login
     * @param string $pass
     *
     * @throws ParseException
     * @throws ValidationException
     *
     * @return GetTokenResponse
     */
    public function getToken(string $login, string $pass): GetTokenResponse
    {
        $response = $this->request('GET', 'getToken', [
            'login' => $login,
            'pass' => $pass,
        ]);

        return $this->converter->getResponseObject(GetTokenResponse::class, $response);
    }

    /**
     * Sell.
     *
     * @param SellRequest $request
     *
     * @return SellResponse
     */
    public function sell(SellRequest $request): SellResponse
    {
        return $this->register($request, self::OPERATION_SELL);
    }

    /**
     * Refund.
     *
     * @param SellRequest $request
     *
     * @return SellResponse
     */
    public function refund(SellRequest $request): SellResponse
    {
        return $this->register($request, self::OPERATION_REFUND);
    }

    /**
     * Report.
     *
     * @param string $uuid
     * @param string $token
     *
     * @return ReportResponse
     */
    public function report(string $uuid, string $token): ReportResponse
    {
        $response = $this->request(
            'GET',
            "{$this->groupCode}/report/$uuid",
            ['tokenid' => $token]
        );

        return $this->converter->getResponseObject(ReportResponse::class, $response);
    }

    /**
     * Register (sell / buy with / without refund).
     *
     * @param SellRequest $request
     * @param string $operation
     *
     * @return SellResponse
     */
    private function register(SellRequest $request, string $operation): SellResponse
    {
        $response = $this->request(
            'POST',
            "{$this->groupCode}/{$operation}",
            ['tokenid' => $request->getToken()],
            $request
        );

        return $this->converter->getResponseObject(SellResponse::class, $response);
    }

    /**
     * Send request.
     *
     * @param string $method
     * @param string $path
     * @param array  $query
     * @param string|object|null $body
     *
     * @throws ParseException
     *
     * @return string
     */
    private function request(string $method, string $path, array $query = [], $body = null): string
    {
        $q = Query::build($query);
        $body = $this->parseBody($body);
        $path = trim($path, '/');
        $request = new Request(
            $method,
            "{$this->baseUri}/v3/$path/?$q",
            ['Content-Type' => 'application/json'],
            $body
        );

        return (string) $this->query($request)->getBody();
    }

    /**
     * Prepare body.
     *
     * @param string|object|null $body
     *
     * @throws ParseException
     *
     * @return string
     */
    private function parseBody($body = null): ?string
    {
        if ($body === null || is_string($body)) {
            return $body;
        }

        return $this->converter->getRequestString($body);
    }

    /**
     * @param RequestInterface $request
     *
     * @throws GuzzleException
     *
     * @return ResponseInterface
     */
    private function query(RequestInterface $request)
    {
        return $this->client->send($request, array_merge(
            [RequestOptions::HTTP_ERRORS => false],
            $this->clientOptions
        ));
    }
}
