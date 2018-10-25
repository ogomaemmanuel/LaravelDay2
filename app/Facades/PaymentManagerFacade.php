<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/17/18
 * Time: 3:08 PM
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class PaymentManagerFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PaymentManager';
    }

}