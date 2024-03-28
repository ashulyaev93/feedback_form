<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class PhoneValidationException extends Exception {
    public function __construct($message = "Invalid phone number format.", $code = 0, Throwable $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}
