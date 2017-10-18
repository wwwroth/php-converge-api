<?php

require_once "vendor/autoload.php";

$class = new \wwwroth\Converge\Converge([
    'merchant_id' => '007928',
    'user_id' => 'webpage',
    'pin' => '11TJ9L',
    'demo' => true,
]);

$x = $class->ccVerify([
    'ssl_card_number' => '4242424242424242',
    'ssl_exp_date' => '1120',
    'ssl_cvv2cvc2' => '666',
    'ssl_amount' => '20',
]);

var_dump($x);