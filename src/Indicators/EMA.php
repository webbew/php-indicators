<?php
declare(strict_types=1);

namespace Webbew\PhpIndicators\Indicators;

use Webbew\PhpIndicators\ArrayIndicator;

/**
 * Class EMA
 * @package Webbew\PhpIndicators\Indicators
 */
class EMA extends ArrayIndicator
{
    /**
     * EMA constructor.
     * @param ArrayIndicator $indicator
     * @param int $period
     * @throws \Webbew\PhpIndicators\Exceptions\PeriodCantBeLessNumberException
     */
    public function __construct( ArrayIndicator $indicator, int $period = 2 )
    {
        $this->assertPeriodLess( $period,  2 );

        parent::__construct( array_values( trader_ema($indicator->toArray(), $period) ) );
    }

}
