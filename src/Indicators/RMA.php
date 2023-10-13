<?php
declare(strict_types=1);

namespace Webbew\PhpIndicators\Indicators;

use Webbew\PhpIndicators\ArrayIndicator;

/**
 * Class RMA
 * @package Webbew\PhpIndicators\Indicators
 */
class RMA extends ArrayIndicator
{

    /**
     * RMA constructor.
     * @param ArrayIndicator $indicator
     * @param int $period
     * @throws \Webbew\PhpIndicators\Exceptions\PeriodCantBeLessNumberException
     */
    public function __construct( ArrayIndicator $indicator, int $period = 2)
    {
        $this->assertPeriodLess( $period,  2 );

        $smaSlice = $indicator->part( 0, $period );
        $sma = new SMA( $smaSlice, $period );

        $data = $indicator->toArray();

        $rma = [ $sma->value() ];

        for( $i = $period; $i < count( $data ); ++$i ) {
            $iterator = $i - $period;

            $rma1 = $rma[ $iterator ];

            $rma[] = ( $rma1 * ( $period - 1 ) + $data[ $i ] ) / $period;
        }

        parent::__construct( $rma );
    }

}
