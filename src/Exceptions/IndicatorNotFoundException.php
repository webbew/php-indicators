<?php
declare(strict_types=1);

namespace webbew\PhpIndicators\Exceptions;

use Exception;

class IndicatorNotFoundException extends Exception
{
    protected $message = "Indicator not found.";
}
