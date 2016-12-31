<?php

namespace Spaceboy;

use Spaceboy\GoogleChart;


class PieChart extends GoogleChart {

    const   DATA_LENGTH = 2;


    public static function init () {
        return new PieChart();
    }

}