<?php

namespace Spaceboy;

use Spaceboy\GoogleChart;


class ColumnChart extends GoogleChart {

    const   DATA_LENGTH = NULL;


    public static function init () {
        return new ColumnChart();
    }

}