<?php
declare(strict_types=1);

namespace Webbew\PhpIndicators;

interface Indicator
{
    public function value();
    public function last(int $n = 1);
}
