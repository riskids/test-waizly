<?php

namespace App\Exceptions;

use Exception;

class DataMismatchException extends Exception
{
    protected $code = 404;
    protected $message = 'Data Not Found';
}
