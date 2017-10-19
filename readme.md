#PHP Converge API

A simple, easy to use wrapper for Elavon's Converge API.

##Compatibility

This package will work with PHP >= 5.5 and requires GuzzleHttp ~5.0.

##Installation
Install this package via Composer with 
`composer require "wwwroth/php-converge-api:dev-master"`.

##Example usage
Construct a new instance with your merchant ID, user ID, PIN and if you're using demo credentials or not.
```
$converge = new \wwwroth\Converge\Converge([
    'merchant_id' => '007928',
    'user_id' => 'webpage',
    'pin' => '11TJ9L',
    'demo' => true,
]);
```
You can then call any of the Converge transaction type with `->request()` and provide the transaction type as well as an array of key value pairs to send to the API
### ccgettoken
```
$generateToken = $class->request('ccgettoken', [
    'ssl_card_number' => '5432************',
    'ssl_exp_date' => '0325',
    'ssl_cvv2cvc2' => '321',
    'ssl_amount' => '100.00',
    'ssl_avs_address' => '2 South Street #10',
    'ssl_avs_zip' => '07960',
]);
```
### ccsale
```
$generateToken = $class->request('ccsale', [
    'ssl_card_number' => '4321************',
    'ssl_exp_date' => '0420',
    'ssl_cvv2cvc2' => '123',
    'ssl_amount' => '10.00',
    'ssl_avs_address' => '44 Miller Road',
    'ssl_avs_zip' => '07960',
]);
```