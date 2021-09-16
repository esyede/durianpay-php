<?php

require './vendor/autoload.php';

use Esyede\DurianPay\Customer\Info as CustomerInfo;
use Esyede\DurianPay\Customer\Address as CustomerAddress;
use Esyede\DurianPay\Http\Client as HttpClient;

use Esyede\DurianPay\Order\Order;
use Esyede\DurianPay\Order\Items as OrderItems;
use Esyede\DurianPay\Order\Report as OrderReport;

use Esyede\DurianPay\Payment\Payment;
use Esyede\DurianPay\Payment\Report as PaymentReport;

// Create Orders
// -------------------------------------

// $address = (new CustomerAddress())
//     ->setReceiverName('Asep Balon')
//     ->setReceiverPhone('6281234567890')
//     ->setLabel('Rumah Asep')
//     ->setAddressLine1('Jalan Buntu')
//     ->setAddressLine2('Ngrambe')
//     ->setCity('Ngawi')
//     ->setRegion('Jawa Timur')
//     ->setCountry('Indonesia')
//     ->setPostalCode('12345')
//     ->setLandmark('Lampu Merah Ngrambe');


// $customer = (new CustomerInfo())
//     ->setRefId('TRX-221453')
//     ->setGivenName('Abdul Rofiq')
//     ->setEmail('abdul.rofiq@gmail.com')
//     ->setMobile('08521346571')
//     ->setAddress($address);

// $httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
// $order = new Order($httpClient, $customer, $address);
// $items = new OrderItems();

// $items->add('Sendal Jepit', 1, 20000, 'https://google.com/image.png')
//     ->add('Sepatu Kuda', 6, 50000, 'https://google.com/image.png')
//     ->add('Es Batu', 12, 2000, 'https://google.com/image.png')
//     ->add('Bakso Cup', 4, 5000, 'https://google.com/image.png');


// $result = $order->create('TRX-123456', $items);
// print_r($result);


// Orders Fetch all
// -------------------------------------

// $httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
// $status = new OrderReport($httpClient);
// print_r($status->fetchAll());


// Orders Fetch by ID
// -------------------------------------

$orderId = 'ord_Fv9xOJP8pr3092';
$httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
$status = new OrderReport($httpClient);
print_r($status->fetchById($orderId));


// Payments pay with Ewallet
// -------------------------------------

$orderId = 'ord_JSkeU8Lbdk9565';
$httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
$payment = new Payment($httpClient);
print_r($payment->payEwallet($orderId, 364000, '081234567890', 'DANA'));
