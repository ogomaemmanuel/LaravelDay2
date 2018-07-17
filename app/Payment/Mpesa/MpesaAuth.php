<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/17/18
 * Time: 4:53 AM
 */

namespace App;


use GuzzleHttp\Client;

class MpesaAuth implements PaymentDecoratorInterface
{
    private $key;
    private $secret;
    public  function __construct($key, $secret)
    {
        $this->key=$key;
        $this->secret=$secret;
    }

   public function authenticate(){

       $url = 'https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
       $curl = curl_init();
       curl_setopt($curl, CURLOPT_URL, $url);
       $credentials = base64_encode($this->key.":".$this->secret);
       curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
       curl_setopt($curl, CURLOPT_HEADER, true);
       curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
       curl_setopt($curl, CURLOPT_VERBOSE, 1);
       curl_setopt($curl, CURLOPT_HEADER, 1);
       $curl_response = curl_exec($curl);
       $header_size = curl_getinfo($curl, CURLINFO_HEADER_SIZE);

       $body = substr($curl_response, $header_size);
        return json_decode($body)->access_token;

    }




}