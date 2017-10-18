<?php

namespace wwwroth\Converge;

use wwwroth\Converge\Exceptions\ConvergeException;

class Converge
{
    private $merchant_id;
    private $user_id;
    private $pin;
    private $demo;

    private $xmlEndpoint;

    /**
     * Construct Converge object with provided settings.
     * @param array $settings
     */
    public function __construct(array $settings)
    {
        $this->validateSettings($settings);

        $this->merchant_id = $settings['merchant_id'];
        $this->user_id = $settings['user_id'];
        $this->pin = $settings['pin'];

        if (isset($settings['demo']) && is_bool($settings['demo'])) {
            $this->demo = $settings['demo'];
            $this->xmlEndpoint = "https://api.demo.convergepay.com/VirtualMerchantDemo/process.do";
        }  else {
            $this->demo = false;
            $this->xmlEndpoint = "https://api.convergepay.com/VirtualMerchant/process.do";
        }
    }

    /**
     * Validate provided settings when constructing class.
     * @param array $settings
     * @return bool
     * @throws ConvergeException
     */
    private function validateSettings(array $settings)
    {
        if (!isset($settings['merchant_id'])) {
            throw new ConvergeException('Please provide a valid merchant id in settings.');
        }
        if (!isset($settings['user_id'])) {
            throw new ConvergeException('Please provide a valid user id in settings.');
        }
        if (!isset($settings['pin'])) {
            throw new ConvergeException('Please provide a valid pin in settings.');
        }
        return true;
    }

    private function request($parameters)
    {
        $parameters['ssl_merchant_id'] = $this->merchant_id;
        $parameters['ssl_user_id'] = $this->user_id;
        $parameters['ssl_pin'] = $this->pin;
        $parameters['ssl_show_form'] = 'false';
        $parameters['ssl_result_format'] = 'ascii';

        $ch = curl_init($this->xmlEndpoint);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = [];
        foreach (explode("\n", curl_exec($ch)) as $part) {
            $pParts = explode('=', $part);
            $response[$pParts[0]] = $pParts[1];
        }
        var_dump($response);
    }

    public function ccVerify(array $parameters)
    {
        return $this->request(array_merge(['ssl_transaction_type' => 'ccverify'], $parameters));
    }
}