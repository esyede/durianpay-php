<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Payment;

use Esyede\DurianPay\Http\Client as HttpClient;

class Payment
{
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function payVA(string $orderId, string $bankCode, string $name, int $amount)
    {
        $payloads = [
            'type' => 'VA',
            'request' => [
                'order_id' => $orderId,
                'bank_code' => $bankCode,
                'name' => $name,
                'amount' => (string) $amount,
            ],
        ];

        $endpoint = 'payments/charge';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->post($endpoint, $payloads, $headers);
    }

    public function payEwallet(string $orderId, int $amount, string $mobile, string $walletType)
    {
        $payloads = [
            'type' => 'EWALLET',
            'request' => [
                'order_id' => $orderId,
                'amount' => (string) $amount,
                'mobile' => $mobile,
                'wallet_type' => $walletType,
            ],
        ];

        $endpoint = 'payments/charge';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->post($endpoint, $payloads, $headers);
    }

    public function payRetailStore(string $orderId, string $bankCode, string $name, int $amount)
    {
        $payloads = [
            'type' => 'RETAILSTORE',
            'request' => [
                'order_id' => $orderId,
                'bank_code' => $bankCode,
                'name' => $name,
                'amount' => (string) $amount,
            ],
        ];

        $endpoint = 'payments/charge';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->post($endpoint, $payloads, $headers);
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
    public function payQris(string $orderId, int $amount, string $mobile)
    {
        $payloads = [
            'type' => 'QRIS', // ????????????
            'request' => [
                'order_id' => $orderId,
                'amount' => (string) $amount,
                'mobile' => $mobile,
                'wallet_type' => 'QRIS', // ????????????
            ],
        ];

        $endpoint = 'payments/charge';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->post($endpoint, $payloads, $headers);
    }
}
