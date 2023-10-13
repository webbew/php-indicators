<?php
declare(strict_types=1);

namespace Webbew\PhpIndicators\Exceptions;

use Exception;

class CantCompareLessTwoElementsException extends Exception
{
    protected $message = "You can't compare less two elements.";
}
