<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;
class LackofProductAmountException extends Exception
{
    public function report(){
        Log::debug('Not enough product!');
    }
}
