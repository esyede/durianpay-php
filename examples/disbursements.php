<?php

require '../vendor/autoload.php';

use Esyede\DurianPay\Http\Client as HttpClient;
use Esyede\DurianPay\Disbursement\Disbursement;
use Esyede\DurianPay\Disbursement\Items;

$httpClient = new HttpClient('dp_test_pfVvaBXtciKwmlTQ', true);
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
// $response = $disbursement->fetchTopUpDetailsById($topUpId);

// print_r($response);


/*
|--------------------------------------------------------------------------
| Fetch durianpay balance API
|--------------------------------------------------------------------------
*/

// ERROR: merchant not configured properly with a provider in database. Please ensure is_active = TRUE
// $response = $disbursement->fetchDurianPayBalance();

// print_r($response);


/*
|--------------------------------------------------------------------------
| Submit Disbursement API
|--------------------------------------------------------------------------
*/

// $name = 'Testing disbursement';
// $description = 'Testing';

// $accountOwnerName = 'Nama Penerima';
// $bankCode = 'bri';
// $amount = 10000;
// $accountNumber = '1234567890123';
// $emailRecipient = 'recipient@disbursement.com';
// $phoneNumber = '081234567890';
// $notes = 'Catatan transfer';
// $idempotencyKey = uniqid();
// $forceDisburse = false;

// $items = new Items();
// $items->add($accountOwnerName, $bankCode, $amount, $accountNumber, $emailRecipient, $phoneNumber, $notes);

// $response = $disbursement->submitDisbursement($name, $description, $items, $idempotencyKey, $forceDisburse);

// print_r($response);

/*
|--------------------------------------------------------------------------
| Approve Disbursement API
|--------------------------------------------------------------------------
*/

// $disbursementId = 'ugfhfhfh';
// $ignoreInvalid = true;

// $response = $disbursement->approveDisbursement($disbursementId, $ignoreInvalid);

// print_r($response);

/*
|--------------------------------------------------------------------------
| Fetch disbursement items by ID API
|--------------------------------------------------------------------------
*/

// $disbursementId = 'ugfhfhfh';

// $response = $disbursement->fetchDisbursementItemsById($disbursementId);

// print_r($response);

/*
|--------------------------------------------------------------------------
| Fetch disbursement by ID API
|--------------------------------------------------------------------------
*/

// $disbursementId = 'ugfhfhfh';

// $response = $disbursement->fetchDisbursementById($disbursementId);

// print_r($response);

/*
|--------------------------------------------------------------------------
| Delete disbursement API
|--------------------------------------------------------------------------
*/

// $disbursementId = 'ugfhfhfh';

// $response = $disbursement->deleteDisbursementById($disbursementId);

// print_r($response);

/*
|--------------------------------------------------------------------------
| Validate API
|--------------------------------------------------------------------------
*/

// $accountNumber = '1234567890123';
// $bankCode = 'bri';

// $response = $disbursement->validateAccount($accountNumber, $bankCode);

// print_r($response);
