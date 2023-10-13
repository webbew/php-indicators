<?php
declare(strict_types=1);

namespace webbew\PhpIndicators\Exceptions;

use Exception;

class PeriodCantBeNegativeException extends Exception
{
    protected $message = "Period can't be negative.";
}
