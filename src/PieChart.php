<?php

namespace Spaceboy\GoogleCharts;


class PieChart extends GoogleChart {

    const   DATA_LENGTH = 2;

    /**
     * Creates chart class instance
     * @param string HTML ID of chart
     * @return Spaceboy\ChoogleChart
     */
    public static function init ($id = NULL) {
        return new PieChart($id);
    }

}
