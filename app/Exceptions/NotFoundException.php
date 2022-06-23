<?php

namespace App\Exceptions;

use Exception;

class NotFoundException extends Exception
{
    /**
     * NotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = '')
    {
        parent::__construct(
            sprintf("Nic nie znalazłem :(")
        );
    }
}
