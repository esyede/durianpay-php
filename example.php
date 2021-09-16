<?php

require './vendor/autoload.php';

use Esyede\DurianPay\Customer\Info as CustomerInfo;
use Esyede\DurianPay\Customer\Address as CustomerAddress;
use Esyede\DurianPay\Http\Client as HttpClient;
use Esyede\DurianPay\Order\Order;
use Esyede\DurianPay\Order\Items;
use Esyede\DurianPay\Order\Status;

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
// $items = new Items();

// $items->add('Sendal Jepit', 1, 20000, 'https://google.com/image.png')
//     ->add('Sepatu Kuda', 6, 50000, 'https://google.com/image.png')
//     ->add('Es Batu', 12, 2000, 'https://google.com/image.png')
//     ->add('Bakso Cup', 4, 5000, 'https://google.com/image.png');


// $result = $order->create('TRX-123456', $items);
// print_r($result);


// Orders Fetch by ID
// -------------------------------------

// $httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
// $status = new Status($httpClient);
// print_r($status->fetchAll());


// $orderId = 'ord_Fv9xOJP8pr3092';
// $httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
// $status = new Status($httpClient);
// print_r($status->fetchById($orderId));
