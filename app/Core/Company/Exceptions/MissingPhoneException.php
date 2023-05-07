<?php

declare(strict_types=1);

namespace App\Core\Company\Exceptions;

use Exception;

class MissingPhoneException extends Exception
{
    public function __construct
    (
        string $message = 'Company phone is missing',
        int $code = 100,
    ) {
        parent::__construct($message, $code);
    }
}