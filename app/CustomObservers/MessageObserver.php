<?php
/**
 * Created by PhpStorm.
 * User: eogoma
 * Date: 7/19/18
 * Time: 10:04 AM
 */

namespace App\CustomObservers;


interface MessageObserver
{
    public function sendMessage();
}