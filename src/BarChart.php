<?php

namespace Spaceboy;

use Spaceboy\GoogleChart;


class BarChart extends GoogleChart {

    const   DATA_LENGTH = NULL;


    public static function init () {
        return new BarChart();
    }

}