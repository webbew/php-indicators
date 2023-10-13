<?php
declare(strict_types=1);

namespace webbew\PhpIndicators\Indicators;

use webbew\PhpIndicators\ArrayIndicator;
use webbew\PhpIndicators\Exceptions\PeriodCantBeLessNumberException;

/**
 * Class StochRSI
 * @package webbew\PhpIndicators\Indicators
 */
class StochRSI extends ArrayIndicator
{
    /**
     * RSI constructor.
     * @param ArrayIndicator $indicator
     * @param int $period
     * @throws PeriodCantBeLessNumberException
     */
    public function __construct( ArrayIndicator $indicator, int $period = 2 )
    {
        $this->assertPeriodLess( $period,  2 );

        parent::__construct( array_values( trader_stochrsi($indicator->toArray(), $period) ) );
    }

}
