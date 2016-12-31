<?php

namespace Spaceboy;

use Spaceboy\GoogleChart;


class GeoChart extends GoogleChart {

    const   DATA_LENGTH = NULL;


    public static function init () {
        return new GeoChart();
    }

}