<?php

namespace Spaceboy;

use Spaceboy\GoogleChart;


class ComboChart extends GoogleChart {

    const   DATA_LENGTH = NULL;


    public static function init () {
        return new ComboChart();
    }

}