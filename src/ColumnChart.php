<?php

namespace Spaceboy\GoogleCharts;


class ColumnChart extends GoogleChart {

    const   DATA_LENGTH = NULL;

    /**
     * Creates chart class instance
     * @param string HTML ID of chart
     * @return Spaceboy\ChoogleChart
     */
    public static function init ($id = NULL) {
        return new ColumnChart($id);
    }

}
