<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/17/18
 * Time: 5:44 AM
 */

namespace App;

class PaymentManager
{

    private $mpesaAuth;
    private $lipaNaMpesaBuilder;
    function __construct(MpesaAuth $mpesaAuth,LipaNaMpesaBuilder $lipaNaMpesaBuilder)
    {
        $this->mpesaAuth= $mpesaAuth;
        $this->lipaNaMpesaBuilder=$lipaNaMpesaBuilder;

    }

    public function makePayment(){
        $this->lipaNaMpesaBuilder->setAmount("800");
        $this->lipaNaMpesaBuilder->setAccountReference('59404XXX');
        $this->lipaNaMpesaBuilder->setPartyA('254722000011');
        $this->lipaNaMpesaBuilder->setPartyB('174379');
        $this->lipaNaMpesaBuilder->setTimestamp('20160216165627');
        $this->lipaNaMpesaBuilder->setTransactionDesc('Payment for Goods using Mpesa Stk Push');
        $this->lipaNaMpesaBuilder->setTransactionType('CustomerPayBillOnline');
        $this->lipaNaMpesaBuilder->setPhoneNumber('254711472504');
        $this->lipaNaMpesaBuilder->setBusinessShortCode('174379');
        $this->lipaNaMpesaBuilder->setCallBackURL("https://shoppingcartapi20180317120238.azurewebsites.net/api/StkCallBack");
        $this->lipaNaMpesaBuilder->setPassword('MTc0Mzc5YmZiMjc5ZjlhYTliZGJjZjE1OGU5N2RkNzFhNDY3Y2QyZTBjODkzMDU5YjEwZjc4ZTZiNzJhZGExZWQyYzkxOTIwMTYwMjE2MTY1NjI3');
       $lipaNaMpesa= $this->lipaNaMpesaBuilder->build();

       //dd($lipaNaMpesa);

      //dd( "Auth Token" ,$this->mpesaAuth->authenticate());
       $lipaNaMpesa->makePayMent($this->mpesaAuth->authenticate());
    }





}