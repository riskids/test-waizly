<?php

namespace App\Exceptions;

use Exception;

class DataNotFoundException extends Exception
{
    protected $code = 422;
    protected $message = 'Data Mismatch';
}
