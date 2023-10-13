<?php
declare(strict_types=1);

namespace Webbew\PhpIndicators\Exceptions;

use Exception;

class PeriodCantBeNegativeException extends Exception
{
    protected $message = "Period can't be negative.";
}
