<?php

require '../vendor/autoload.php';

use Esyede\DurianPay\Http\Client as HttpClient;
use Esyede\DurianPay\Customer\Info as CustomerInfo;
use Esyede\DurianPay\Customer\Address as CustomerAddress;
use Esyede\DurianPay\Payment\Payment;
use Esyede\DurianPay\Payment\Report;

/*
|--------------------------------------------------------------------------
| Payments Fetch API
|--------------------------------------------------------------------------
*/

$httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ', true);

$report = new Report($httpClient);

// ===== Fetch all with start date, end date
$startDate = new DateTime('now', new DateTimeZone('Asia/Jakarta'));
$endDate = new DateTime('now + 2 days', new DateTimeZone('Asia/Jakarta'));

// $response = $report->fetchAll($startDate, $endDate);

// print_r($response); die;


// ===== Fetch all with start date, end date, limit, skip --> limit dari durianpay gak jalan?
// $limit = 30;
// $skip = 10;

// $response = $report->fetchAll($startDate, $endDate, $limit, $skip);

// print_r($response); die;


/*
|--------------------------------------------------------------------------
| Payments Fetch By ID API
|--------------------------------------------------------------------------
*/

// $orderId = 'pay_psvnEzKzOe5331';
// $response = $report->fetchById($orderId);

// print_r($response); die;


/*
|--------------------------------------------------------------------------
| Payments Charge API
|--------------------------------------------------------------------------
*/

$payment =  new Payment($httpClient);


// ===== Virtual Account (VA) or Bank Transfer

// $orderId = 'ord_DKUztzeVDQ9608'; // ord_Z82kAhOytU1845, ord_wUj30mpheQ5293
// $bankCode = 'MANDIRI';
// $name = 'Asep Balon'; // Name Appear in ATM
// $amount = 77000; // Sesuaikan dengan amount milik orderId

// $response = $payment->payVa($orderId, $bankCode, $name, $amount);

// print_r($response); die;


// ===== E-Wallet

// $orderId = 'ord_kp4Yp4zCNg1156'; // ord_SKp2qK5QfN5998, ord_vfHbGHMRRU0355, ord_3x6jMY0DLm2520
// $amount = 110000; // Sesuaikan dengan amount milik orderId
// $mobile = '081234567890';
// $walletType = 'DANA';

// $response = $payment->payEwallet($orderId, $amount, $mobile, $walletType);

// print_r($response); die;


// ===== Retail Store

// $orderId = 'ord_Et6n80VC8R3115'; // ord_M7TC6XXk0A8123, ord_oKspCZtSLI2245, ord_h3tN3XJhev5695
// $bankCode = 'ALFAMART'; // Isi dengan ALFAMART atau INDOMARET
// $name = 'Asep Balon'; // Name Appear in ATM
// $amount = 31500; // Sesuaikan dengan amount milik orderId

// $response = $payment->payRetailStore($orderId, $bankCode, $name, $amount);

// print_r($response); die;


// ===== Online Banking [ERROR!]

// $orderId = 'ord_vfHbGHMRRU0355'; // ord_hZjaQodudZ1364, ord_kKyNzqQnGA8499
// $type = 'JENIUSPAY';
// $name = 'Asep Balon'; // Name Appear in ATM
// $amount = 10000; // Sesuaikan dengan amount milik orderId
// $customer = (new CustomerInfo())
//     ->setEmail('asep.balon@gmail.com')
//     ->setGivenName('Asep Balon')
//     ->setMobile('081234567890')
//     ->setCustomerId('cus_ZYG4hzWUMh4686');

// $response = $payment->payOnlineBanking($orderId, $type, $name, $amount, $customer);

// print_r($httpClient->debugs); die;


// ===== BCA Aggregator

// $orderId = 'ord_kKyNzqQnGA8499'; // ord_hZjaQodudZ1364, ord_kKyNzqQnGA8499
// $name = 'Asep Balon'; // Name Appear in ATM
// $amount = 10000; // Sesuaikan dengan amount milik orderId
// $customer = (new CustomerInfo())
//     ->setEmail('asep.balon@gmail.com')
//     ->setGivenName('Asep Balon')
//     ->setCustomerId('cus_ZYG4hzWUMh4686');

// $response = $payment->payBcaAggregator($orderId, $name, $amount, $customer);

// print_r($response); die;


// ===== QRIS

// $orderId = 'ord_Z82kAhOytU1845'; // ord_hZjaQodudZ1364, ord_kKyNzqQnGA8499
// $amount = 10000; // Sesuaikan dengan amount milik orderId
// $mobile = '081234567890';

// $response = $payment->payQris($orderId, $amount, $mobile);

// print_r($response); die;
