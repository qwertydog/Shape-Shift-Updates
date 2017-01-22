<?php

namespace SSPro\Model;

use PDO;
use PDOException;

class Prices extends Base
{

    /**
     *  Sets the Shape Shifter Rate in the Database
     *  -- Coin must be as 'BTC_<name>
     */
    public function setShapeShifterRate($coin, $rateBTC, $rateALT, $limit, $fee)
    {
        date_default_timezone_set('NZ');
        $date = date("H:i:s d-m-Y");

        $sql = "INSERT INTO `shapeshifter_rates` (`id`, `coin`, `rate_btc`, `rate_alt`, `limit`, `fee`, `created_at`) 
                VALUES (NULL, '$coin', '$rateBTC', '$rateALT', '$limit', '$fee', '$date');
                ";
        //var_dump($sql);die();
        $stm = $this->database->prepare(($sql), array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $data = $stm->execute(array('$coin, $rateBTC, $rateALT, $limit, $fee, $date'));
        return true;
    }



    /**
     *  Sets the Poloniex Rate in the Database
     *  -- Coin must be as 'BTC_<name>
     */
    public function setPoloniexRate($coin, $rateBTC, $rateALT)
    {
        date_default_timezone_set('NZ');
        $date = date("H:i:s d-m-Y");

        $sql = "INSERT INTO `poloniex_rates` (`id`, `coin`, `rate_btc`, `rate_alt`, `created_at`) 
                VALUES (NULL, '$coin', '$rateALT', '$rateBTC', '$date');";
        //var_dump($sql);die();
        $stm = $this->database->prepare(($sql), array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $data = $stm->execute(array('$coin, $rateALT, $rateBTC, $date'));
        return true;
    }



    /**
     *  Gets the Shape Shifter Rate in the Database
     *  -- Coin must be as 'BTC_<name>
     */
    public function getShapeShifterRate($coin)
    {
        $sql = "SELECT `rate_btc`, `rate_alt`, `created_at`
                FROM `shapeshifter_rates`  
                WHERE `coin` = '$coin'
                ORDER BY `id` DESC 
                LIMIT 5
                ";

        $stm = $this->database->prepare(($sql), array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $stm->execute();

        $data = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }


    /**
     *  Sets the Poloniex Rate in the Database
     *  -- Coin must be as 'BTC_<name>
     */
    public function getPoloniexRate($coin)
    {
        $sql = "SELECT `rate_btc`, `rate_alt`, `created_at`
                FROM `poloniex_rates`  
                WHERE `coin` = '$coin'
                ORDER BY `id` DESC 
                LIMIT 5
                ";

        $stm = $this->database->prepare(($sql), array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));

        $stm->execute();

        $data = $stm->fetchAll(PDO::FETCH_ASSOC);

        return $data;
    }


}