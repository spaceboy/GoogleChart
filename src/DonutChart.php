<?php

namespace Spaceboy\GoogleCharts;


class DonutChart extends GoogleChart {

    const   DATA_LENGTH         = 2;
    const   DEFAULT_PIE_HOLE    = 0.4;

    /**
     * Creates chart class instance
     * @param string HTML ID of chart
     * @return Spaceboy\ChoogleChart
     */
    public static function init ($id = NULL) {
        $donut  = new DonutChart($id, 'PieChart');
        return $donut->setPieHole(self::DEFAULT_PIE_HOLE);
    }

    /**
     * PieHole size setter
     * @param real $pieHole
     * @return Spaceboy\GoogleChart
     */
    public function setPieHole ($pieHole) {
        $this->options['pieHole']   = $pieHole;
        return $this;
    }

    /**
     * PieHole size getter
     * @return real
     */
    public function getPieHole () {
        return $this->options['pieHole'];
    }

}
