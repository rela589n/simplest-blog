<?php

namespace App\Exceptions;

use RuntimeException;
use Throwable;

class AlreadyLikedException extends RuntimeException
{
    private $likeable;

    public function __construct($message, $likeable)
    {
        parent::__construct($message);
        $this->likeable = $likeable;
    }

    public function getLikeable()
    {
        return $this->likeable;
    }
}
