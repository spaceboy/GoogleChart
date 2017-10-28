<?php

namespace Spaceboy\GoogleCharts;


class CandlestickChart extends GoogleChart {

    const   DATA_LENGTH = 5;

    /**
     * Creates chart class instance
     * @param string HTML ID of chart
     * @return Spaceboy\ChoogleChart
     */
    public static function init ($id = NULL) {
        return new CandlestickChart($id);
    }

}
