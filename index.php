<?php

require_once "vendor/autoload.php";

$class = new \wwwroth\Converge\Converge([
    'merchant_id' => '007928',
    'user_id' => 'webpage',
    'pin' => '11TJ9L',
    'demo' => true,
]);

/*
$authonly = $class->request('ccauthonly', [
    'ssl_card_number' => '4124939999999990',
    'ssl_exp_date' => '0420',
    'ssl_cvv2cvc2' => '123',
    'ssl_amount' => '100.00',
    'ssl_avs_address' => '2 South Street',
    'ssl_avs_zip' => '07960',
]);

var_dump($authonly);

string(323) "id=Pr21HVPXcKu88FPGGdQxcnO1016414721
ssl_txn_currency_code=
ssl_markup=
ssl_dcc_rate_provider=
ssl_conversion_rate=
ssl_amount=100.00
ssl_cardholder_amount=
dccoption={(option label='Please charge my purchase in my home currency')=Y;(option label='Do not charge me in my home currency; charge my purchase in US dollars')=N}"

*/

/*
$verification = $class->request('ccverify', [
    'ssl_card_number' => '4124939999999990',
    'ssl_exp_date' => '0420',
    'ssl_cvv2cvc2' => '123',
    'ssl_amount' => '100.00',
    'ssl_avs_address' => '2 South Street',
    'ssl_avs_zip' => '07960',
]);

var_dump($verification);

array(12) {
    ["ssl_card_number"]=>
  string(16) "41**********9990"
    ["ssl_exp_date"]=>
  string(4) "0420"
    ["ssl_card_short_description"]=>
  string(4) "VISA"
    ["ssl_result"]=>
  string(1) "0"
    ["ssl_result_message"]=>
  string(8) "APPROVAL"
    ["ssl_txn_id"]=>
  string(46) "181017A15-F844D494-1354-4582-8D13-163170D87472"
    ["ssl_approval_code"]=>
  string(6) "357321"
    ["ssl_cvv2_response"]=>
  string(1) "U"
    ["ssl_avs_response"]=>
  string(1) "Z"
    ["ssl_account_balance"]=>
  string(4) "0.00"
    ["ssl_txn_time"]=>
  string(22) "10/18/2017 05:58:25 PM"
    ["ssl_card_type"]=>
  string(10) "CREDITCARD"
}
*/