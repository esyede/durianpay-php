<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Payment;

use Esyede\DurianPay\Http\Client as HttpClient;

class Report
{
    /**
     * HTTP requestor client.
     *
     * @var HttpClient
     */
    private $httpClient;

    /**
     * Constructor.
     *
     * @param HttpClient $httpClient
     */
    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Fetch all created payment details.
     *
     * @param int $limit
     * @param int $skip
     *
     * @return \stdClass|false
     */
    public function fetchAll(int $limit = 50, int $skip = 0)
    {
        $limit = ($limit < 1) ? 1 : $limit;
        $skip = ($skip < 0) ? 0 : $skip;

        $payloads = compact('limit', 'skip');

        $endpoint = 'payments';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->get($endpoint, $payloads, $headers);
    }

    /**
     * Fetch spesific payment details.
     *
     * @param string $paymentId
     *
     * @return \stdClass|false
     */
    public function fetchById(string $paymentId)
    {
        $payloads = [];
        $endpoint = 'payments/' . $paymentId;
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->get($endpoint, $payloads, $headers);
    }

    /**
     * Check payment status.
     *
     * @param string $paymentId
     *
     * @return \stdClass|false
     */
    public function checkPaymentStatus(string $paymentId)
    {
        $payloads = [];
        $endpoint = 'payments/' . $paymentId . '/status';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->get($endpoint, $payloads, $headers);
    }

    /**
     * Verify a payment status.
     *
     * @param string $paymentId
     * @param string $verificationSignature
     *
     * @return \stdClass|false
     */
    public function verifyPayment(string $paymentId, string $verificationSignature)
    {
        $payloads = [
            'verification_signature' => $verificationSignature,
        ];

        $endpoint = 'payments/' . $paymentId . '/verify';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->get($endpoint, $payloads, $headers);
    }

    /**
     * Cancel a payment.
     *
     * @param string $value
     *
     * @return \stdClass|false
     */
    public function cancelPayment($value='')
    {
        $payloads = [];
        $endpoint = 'payments/' . $paymentId . '/cancel';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->get($endpoint, $payloads, $headers);
    }
}
