<?php

namespace Spaceboy;

use Spaceboy\GoogleChart;


class CandlestickChart extends GoogleChart {

    const   DATA_LENGTH = 5;


    public static function init () {
        return new CandlestickChart();
    }

}