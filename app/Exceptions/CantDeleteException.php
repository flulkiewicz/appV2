<?php

namespace App\Exceptions;

use Exception;

class CantDeleteException extends Exception
{
    /**
     * NotFoundException constructor.
     * @param string $message
     */
    public function __construct(string $message = '')
    {
        parent::__construct(
            sprintf("Ten użytkownik ma przypisane zadania, nie możesz go usunąć!")
        );
    }
}
