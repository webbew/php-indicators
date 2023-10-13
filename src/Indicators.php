<?php

namespace webbew\PhpIndicators;

use webbew\PhpIndicators\Exceptions\IndicatorNotFoundException;
use webbew\PhpIndicators\Indicators\ATR;
use webbew\PhpIndicators\Indicators\BBands;
use webbew\PhpIndicators\Indicators\EMA;
use webbew\PhpIndicators\Indicators\MACD;
use webbew\PhpIndicators\Indicators\RMA;
use webbew\PhpIndicators\Indicators\RSI;
use webbew\PhpIndicators\Indicators\SMA;
use webbew\PhpIndicators\Indicators\StochRSI;

use function trader_atr;
use function trader_bbands;
use function trader_ema;
use function trader_macd;
use function trader_rsi;
use function trader_sma;
use function trader_stochrsi;

/**
 * Class Indicators
 * @package webbew\PhpIndicators
 *
 * @method RSI rsi( ArrayIndicator $indicator, int $period = 2)
 * @method EMA ema( ArrayIndicator $indicator, int $period = 2)
 * @method SMA sma( ArrayIndicator $indicator, int $period = 2)
 * @method RMA rma( ArrayIndicator $indicator, int $period = 2)
 * @method StochRSI stochrsi( ArrayIndicator $indicator, int $period = 2)
 * @method ATR atr( ArrayIndicator $high, ArrayIndicator $low, ArrayIndicator $close, int $period = 2)
 * @method BBands bbands(  ArrayIndicator $indicator, ?int $timePeriod = null, ?float $nbDevUp = null, ?float $nbDevDn = null, ?int $mAType = null )
 * @method MACD macd( ArrayIndicator $indicator, ?int $fastPeriod = null, ?int $slowPeriod = null, ?int $signalPeriod = null )
 */
class Indicators
{
    private $registry = [];

    public function __construct()
    {
        $classes = $this->defaultIndicatorsRoutes();

        foreach ( $classes as $method => $class ) {
            $this->register( $method, $class );
        }
    }

    public function register( string $key, string $indicator )
    {
        $this->registry[ $key ] = $indicator;
    }

    /**
     * @param string $name
     * @param array $arguments
     * @return mixed
     * @throws IndicatorNotFoundException
     */
    public function __call( string $name, array $arguments = [] )
    {
        if ( isset( $this->registry[ $name ] ) && class_exists( $this->registry[ $name ] ) ) {
            return new $this->registry[ $name ]( ...$arguments );
        }

        throw new IndicatorNotFoundException();
    }

    private function defaultIndicatorsRoutes()
    {
        return [
            'atr' => ATR::class,
            'bbands' => BBands::class,
            'ema' => EMA::class,
            'sma' => SMA::class,
            'rsi' => RSI::class,
            'rma' => RMA::class,
            'macd' => MACD::class,
            'stochrsi' => StochRSI::class,
        ];
    }
}
