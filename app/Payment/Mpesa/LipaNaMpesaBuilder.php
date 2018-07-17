<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/17/18
 * Time: 8:46 AM
 */

namespace App;


class LipaNaMpesaBuilder
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


    public function setBusinessShortCode($businessShortCodeCode)
    {
        $this->BusinessShortCode = $businessShortCodeCode;
        return $this;

    }

    public function setPassword($password)
    {
        $this->Password = $password;
        return $this;
    }

    public function setTimestamp($timestamp)
    {
        $this->Timestamp = $timestamp;
        return $this;
    }

    public function setTransactionType($transactionType)
    {
        $this->TransactionType = $transactionType;
        return $this;
    }

    public function setAmount($amount)
    {
        $this->Amount = $amount;
        return $this;
    }

    public function setPartyA($partyA)
    {
        $this->PartyA = $partyA;
        return $this;
    }

    /**
     * @param mixed $PhoneNumber
     */
    public function setPhoneNumber($PhoneNumber)
    {
        $this->PhoneNumber = $PhoneNumber;
        return $this;
    }


    public function setPartyB($partyB)
    {
        $this->PartyB = $partyB;
        return $this;
    }

    /**
     * @param mixed $CallBackURL
     */
    public function setCallBackURL($CallBackURL)
    {
        $this->CallBackURL = $CallBackURL;
        return $this;
    }

    /**
     * @param mixed $AccountReference
     */
    public function setAccountReference($AccountReference)
    {
        $this->AccountReference = $AccountReference;
        return $this;
    }

    /**
     * @param mixed $TransactionDesc
     */
    public function setTransactionDesc($TransactionDesc)
    {
        $this->TransactionDesc = $TransactionDesc;
        return $this;
    }

   public function build()
    {
        return new LipaNaMpesa($this->BusinessShortCode,
            $this->Password,
            $this->Timestamp,
            $this->TransactionType,
            $this->Amount,
            $this->PartyA,
            $this->PartyB,
            $this->PhoneNumber,
            $this->CallBackURL,
            $this->AccountReference,
            $this->TransactionDesc
        );
    }
}