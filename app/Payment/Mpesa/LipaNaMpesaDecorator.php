<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/17/18
 * Time: 11:32 AM
 */

namespace App;


use Illuminate\Support\Facades\Log;

class LipaNaMpesaDecorator implements PaymentDecoratorInterface
{

    private $logDecoratorInterface;

    function __construct(PaymentDecoratorInterface $logDecoratorInterface)
    {
        $this->logDecoratorInterface=$logDecoratorInterface;
    }

    public function authenticate()
    {
        Log::debug("Testing Decorator Pattern");
      $accessToken=  $this->logDecoratorInterface->authenticate();
      echo("Access Token from the Decorator " . $accessToken);
      return $accessToken;
        // TODO: Implement log() method.
    }
}