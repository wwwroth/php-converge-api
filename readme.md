# PHP Converge API

A simple, easy to use wrapper for Elavon's Converge API via key value pairs instead of XML.

## Compatibility

This package will work with PHP >= 5.5 with CURL enabled.

## Installation
Install this package via Composer with 
`composer require wwwroth/php-converge-api`.

## Example usage
Construct a new instance with your merchant ID, user ID, PIN and if you're using demo credentials or not.
```
$converge = new \wwwroth\Converge\Converge([
    'merchant_id' => '12345',
    'user_id' => 'webpage',
    'pin' => '123456',
    'demo' => true,
]);
```
You can then call any of the Converge transaction type with `->request()` and provide the transaction type as well as an array of key value pairs to send to the API. The package will use the demo or live endpoint automatically based on how you constructed the object.
### ccgettoken
```
$generateToken = $converge->request('ccgettoken', [
    'ssl_card_number' => '5432************',
    'ssl_exp_date' => '0325',
    'ssl_cvv2cvc2' => '321',
    'ssl_amount' => '100.00',
    'ssl_avs_address' => '2 South Street #10',
    'ssl_avs_zip' => '07960',
]);
if ($generateToken['success']) { ... }
```
### ccsale
```
$createSale = $converge->request('ccsale', [
    'ssl_card_number' => '4321************',
    'ssl_exp_date' => '0420',
    'ssl_cvv2cvc2' => '123',
    'ssl_amount' => '10.00',
    'ssl_avs_address' => '44 Miller Road',
    'ssl_avs_zip' => '07960',
]);
if ($createSale['success']) { ... }
```
### All Transaction Types
```
* ccauthonly
* ccavsonly
* ccsale
* ccverify
* ccgettoken
* cccredit
* ccforce
* ccbalinquiry
* ccgettoken
* ccreturn
* ccvoid
* cccomplete
* ccdelete
* ccupdatetip
* ccsignature
* ccaddrecurring
* ccaddinstall
* ccupdatetoken
* ccdeletetoken
* ccquerytoken
```
