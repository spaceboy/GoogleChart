<?php

namespace Spaceboy;

use Spaceboy\GoogleChart;


class BubbleChart extends GoogleChart {

    const   DATA_LENGTH = 5;


    public static function init () {
        return new BubbleChart();
    }

}