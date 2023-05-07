<?php

declare(strict_types=1);

namespace App\Core\Company\Exceptions;

use Exception;

class MissingNameException extends Exception
{
    public function __construct
    (
        string $message = 'Company name is missing',
        int $code = 100,
    ) {
        parent::__construct($message, $code);
    }
}