<?php

namespace SSPro;

class Poloniex
{
    /**
     * String must have a valid coin to coin reference
     * Example
     * 'BTC_ETH'
     * 'USDT_BTC'
     */
    public function getCoinData($coin)
    {
        $uri = "https://poloniex.com/public?command=returnTicker";

        $data = json_decode(file_get_contents($uri), true);

        return $data[$coin];
    }


}