<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/17/18
 * Time: 8:26 AM
 */

namespace App;


class LipaNaMpesa
{
    private $BusinessShortCode;
    private $Password;
    private $Timestamp;
    private $TransactionType;
    private $Amount;
    private $PartyA;
    private $PartyB;
    private $PhoneNumber;
    private $CallBackURL;
    private $AccountReference;
    private $TransactionDesc;

    public function __construct($businessShortCode,
                                $password,$timestamp,
                                $transactionType,$amount,
                                $partyA,$partyB,$phoneNumber,
                                $callBackURL,$accountReference,$transactionDesc)
    {
        $this->BusinessShortCode=$businessShortCode;
        $this->Password=$password;
        $this->Timestamp=$timestamp;
        $this->TransactionType=$transactionType;
        $this->Amount=$amount;
        $this->PartyA=$partyA;
        $this->PartyB=$partyB;
        $this->PhoneNumber=$phoneNumber;
        $this->CallBackURL=$callBackURL;
        $this->AccountReference=$accountReference;
        $this->TransactionDesc=$transactionDesc;
    }


    public function makePayMent($accessToken){
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer ' .$accessToken)); //setting custom h
        $data_string = json_encode($this);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);
        print_r($curl_response);
        echo $curl_response;
    }
}