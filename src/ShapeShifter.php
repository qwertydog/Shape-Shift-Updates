<?php

namespace SSPro;

class ShapeShifter
{

    /**
     * Gets the Shape Shifter rates from the public API
     *
     * Valid coins must be in the BTC_<alt> naming schedule
     */
    public function getCoinData($coin)
    {
        $uri = "https://shapeshift.io/marketinfo/$coin";
        $result = json_decode(file_get_contents($uri), true); // converts it to an array object
        return $result;
    }


}


