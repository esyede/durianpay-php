<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Order;

use Esyede\DurianPay\Http\Client as HttpClient;

class Status
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function fetchAll(int $limit = 50, int $skip = 0)
    {
        $limit = ($limit < 1) ? 1 : $limit;
        $skip = ($skip < 0) ? 0 : $skip;

        $payloads = compact('limit', 'skip');

        $endpoint = 'orders';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->get($endpoint, $payloads, $headers);
    }

    public function fetchById(string $orderId)
    {
        $payloads = [];
        $endpoint = 'orders/' . $orderId;
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->get($endpoint, $payloads, $headers);
    }
}
