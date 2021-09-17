<?php

require '../vendor/autoload.php';

use Esyede\DurianPay\Http\Client as HttpClient;
use Esyede\DurianPay\Disbursement\Disbursement;
use Esyede\DurianPay\Disbursement\Items;


$httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ');
$disbursement = new Disbursement($httpClient);

/*
|--------------------------------------------------------------------------
| Fetch bank list
|--------------------------------------------------------------------------
*/

// $response = $disbursement->fetchBankLists();

// print_r($response);

/*
|--------------------------------------------------------------------------
| Top-up Amount
|--------------------------------------------------------------------------
*/

// ERROR: top-up not allowed in sandbox mode (Code: DPAY_INTERNAL_ERROR)
// $response = $disbursement->topUp(16, 100000);

// print_r($response);


/*
|--------------------------------------------------------------------------
| Fetch top-up detail by ID API
|--------------------------------------------------------------------------
*/

// $topUpId = ''; // Bingung dapet dari mana.
// $response = $disbursement->fetchTopUpDetailById($topUpId);

// print_r($response);


/*
|--------------------------------------------------------------------------
| Fetch durianpay balance API
|--------------------------------------------------------------------------
*/

// ERROR: merchant not configured properly with a provider in database. Please ensure is_active = TRUE
$response = $disbursement->fetchDurianPayBalance();

print_r($response);


/*
|--------------------------------------------------------------------------
| Submit Disbursement API
|--------------------------------------------------------------------------
*/

