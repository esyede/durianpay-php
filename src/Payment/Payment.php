<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Order;

use Esyede\DurianPay\Http\Client as HttpClient;

class Payment
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Payments Charge QRIS (not working!).
     *
     * @param  string $orderId
     * @param  int    $amount
     * @param  string $mobile
     *
     * @return \stdClass|false
     */
    public function qris(string $orderId, int $amount, string $mobile)
    {
        $payloads = [
            'type' => 'QRIS', // ????????????
            'request' => [
                'order_id' => $orderId,
                'amount' => $amount,
                'mobile' => $mobile,
                'wallet_type' => 'QRIS', // ????????????
            ],
        ];

        $endpoint = 'payments/charge';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->post($endpoint, $payloads, $headers);
    }
}
