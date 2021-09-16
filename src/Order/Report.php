<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Order;

use Esyede\DurianPay\Http\Client as HttpClient;
use DateTime;
use DateTimeZone;

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
     * Retrieves the details of all payments created.
     *
     * @param DateTime      $startDate
     * @param DateTime|null $endDate
     * @param int           $limit
     * @param int           $skip
     *
     * @return \stdClass|false
     */
    public function fetchAll(DateTime $startDate, DateTime $endDate = null, int $limit =  25, int $skip = 0)
    {
        if (is_null($endDate)) {
            $endDate = new DateTime('now');
        }

        $startDate = $startDate->setTimezone(new DateTimeZone('Asia/Jakarta'))->getTimestamp();
        $endDate = $endDate->setTimezone(new DateTimeZone('Asia/Jakarta'))->getTimestamp();

        if ($startDate > $endDate) {
            $this->httpClient->addError('Order status fetchAll: startDate cannot be greater than endDate');
            return false;
        }

        $endpoint = 'orders';
        $headers = ['Content-Type' => 'application/json'];

        $limit = ($limit < 1) ? 1 : $limit;
        $skip = ($skip < 0) ? 0 : $skip;

        $payloads = [
            'from' => $startDate,
            'to' => $endDate,
            'limit' => $limit,
            'skip' => $skip,
        ];

        return $this->httpClient->get($endpoint, $payloads, $headers);
    }

    /**
     * Retrieves the details of a single payment.
     *
     * @param string $orderId
     * @param array  $expands
     *
     * @return \stdClass|false
     */
    public function fetchById(string $orderId, array $expands = [])
    {
        $endpoint = 'orders/' . $orderId;
        $headers = ['Content-Type' => 'application/json'];
        $payloads = [];

        if (count($expands) > 0) {
            $payloads = ['expand' => $expands];
        }

        return $this->httpClient->get($endpoint, $payloads, $headers);
    }
}
