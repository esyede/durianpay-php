<?php

declare(strict_types=1);

namespace Esyede\DurianPay\Order;

use Esyede\DurianPay\Customer\Info as CustomerInfo;
use Esyede\DurianPay\Customer\Address as CustomerAddress;
use Esyede\DurianPay\Http\Client as HttpClient;

class Order
{
    private $httpClient;

    private $customer;
    private $address;


    public function __construct(HttpClient $httpClient, CustomerInfo $customer, CustomerAddress $address)
    {
        $this->httpClient = $httpClient;
        $this->customer = $customer;
        $this->address = $address;
    }

    public function create(string $orderRefId, Items $items)
    {
        if ($items->empty()) {
            throw new Exception('Item is empty.');
        }

        $all = $items->all();
        $amount = 0;

        foreach ($all as $item) {
            $amount += $item['price'] * $item['qty'];
        }

        $customer = $this->customer;
        $address = $this->address;

        $payloads = [
            'amount' => $amount.'.00',
            'payment_option' => 'full_payment',
            'currency' => 'IDR',
            'order_ref_id' => $orderRefId,
            'customer' => [
                'customer_ref_id' => $customer->getRefId(),
                'given_name' => $customer->getGivenName(),
                'email' => $customer->getEmail(),
                'mobile' => $customer->getMobile(),
                'address' => [
                    'receiver_name' => $address->getReceiverName(),
                    'receiver_phone' => $address->getReceiverPhone(),
                    'label' => $address->getLabel(),
                    'address_line_1' => $address->getAddressLine1(),
                    'address_line_2' => $address->getAddressLine2(),
                    'city' => $address->getCity(),
                    'region' => $address->getRegion(),
                    'country' => $address->getCountry(),
                    'postal_code' => $address->getPostalCode(),
                    'landmark' => $address->getLandmark(),
                ],
            ],
            'items' => $items->all(),
        ];

        $endpoint = 'orders';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->post($endpoint, $payloads, $headers);
    }

    public function createLink(int $amount, string $orderRefId, CustomerInfo $customer)
    {
        $payloads = [
            'amount' => (string) $amount,
            'currency' => 'IDR',
            'order_ref_id' => $orderRefId,
            'is_payment_link' => true,
            'customer' => [
                'email' => $customer->getEmail(),
            ],
        ];

        $endpoint = 'orders';
        $headers = ['Content-Type' => 'application/json'];

        return $this->httpClient->post($endpoint, $payloads, $headers);
    }
}
