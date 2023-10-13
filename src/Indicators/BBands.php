<?php
declare(strict_types=1);

namespace webbew\PhpIndicators\Indicators;

use webbew\PhpIndicators\ArrayIndicator;

/**
 * Class BBands
 * @package webbew\PhpIndicators\Indicators
 */
class BBands extends ArrayIndicator
{
    /**
     * BBands constructor.
     * @param ArrayIndicator $indicator
     * @param int|null $timePeriod
     * @param float|null $nbDevUp
     * @param float|null $nbDevDn
     * @param int|null $mAType
     * @throws \webbew\PhpIndicators\Exceptions\PeriodCantBeLessNumberException
     */
    public function __construct( ArrayIndicator $indicator, ?int $timePeriod = null, ?float $nbDevUp = null, ?float $nbDevDn = null, ?int $mAType = null )
    {
        $this->assertPeriodLess( $timePeriod,  2 );

        parent::__construct( array_values( trader_bbands( $indicator->toArray(), $timePeriod, $nbDevUp, $nbDevDn, $mAType ) ) );
    }
}
