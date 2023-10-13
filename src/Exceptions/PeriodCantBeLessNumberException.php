<?php
declare(strict_types=1);

namespace Webbew\PhpIndicators\Exceptions;

use Exception;

class PeriodCantBeLessNumberException extends Exception
{
    protected $message = "Period can't be less got value.";
}
