<?php

require './vendor/autoload.php';

use Esyede\DurianPay\Customer\Info as CustomerInfo;
use Esyede\DurianPay\Customer\Address as CustomerAddress;
use Esyede\DurianPay\Http\Client as HttpClient;

use Esyede\DurianPay\Order\Order;
use Esyede\DurianPay\Order\Items as OrderItems;
use Esyede\DurianPay\Order\Metadata as OrderMetadata;
use Esyede\DurianPay\Order\Report as OrderReport;

use Esyede\DurianPay\Payment\Payment;
use Esyede\DurianPay\Payment\Report as PaymentReport;

// Create Orders
// -------------------------------------

$address = (new CustomerAddress())
    ->setReceiverName('Asep Balon')
    ->setReceiverPhone('6281234567890')
    ->setLabel('Rumah Asep')
    ->setAddressLine1('Jalan Buntu')
    ->setAddressLine2('Ngrambe')
    ->setCity('Ngawi')
    ->setRegion('Jawa Timur')
    ->setCountry('Indonesia')
    ->setPostalCode('12345')
    ->setLandmark('Lampu Merah Ngrambe');

$metadata = (new OrderMetadata())
    ->set('foo', 'bar')
    ->set('baz', 'qux');

$customer = (new CustomerInfo())
    ->setRefId('TRX-' . random_int(999, 99999))
    ->setGivenName('Tripay User')
    ->setEmail('tripay.user@gmail.com')
    ->setMobile('08521346571323')
    ->setAddress($address)
    ->setMetadata($metadata);

$httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
$order = new Order($httpClient, $customer, $address, $metadata);

// $items = new OrderItems();
// $items->add('Sendal Jepit', 1, 20000, 'https://google.com/image.png')
//     ->add('Sepatu Kuda', 6, 50000, 'https://google.com/image.png')
//     ->add('Es Batu', 12, 2000, 'https://google.com/image.png')
//     ->add('Bakso Cup', 4, 5000, 'https://google.com/image.png');

// Create payment link (instapay)
$result = $order->createLink('TRX-999999', 20000, $customer);
print_r($result);


// $result = $order->create('TRX-123456', $items);
// print_r($result);


// Orders Fetch all
// -------------------------------------

// $httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
// $status = new OrderReport($httpClient);
// print_r($status->fetchAll(new DateTime()));


// Orders Fetch by ID
// -------------------------------------

// $orderId = 'ord_DKUztzeVDQ9608';
// $httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
// $status = new OrderReport($httpClient);
// print_r($status->fetchById($orderId));


// Payments pay with Ewallet
// -------------------------------------

// $orderId = 'ord_JSkeU8Lbdk9565';
// $httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
// $payment = new Payment($httpClient);
// print_r($payment->payEwallet($orderId, 364000, '081234567890', 'DANA'));
