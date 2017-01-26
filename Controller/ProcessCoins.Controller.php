<?php

namespace SSPro\Controller;

use PHPMailer;
use SSPro\Model\Prices;
use SSPro\Poloniex;
use SSPro\ShapeShifter;

class ProcessCoins extends Base
{
    private $shape;
    private $poloniex;

    /**
     * Constructs the ProcessCoins object with objects of
     *  - ShapeShifter
     *  - Poloniex
     */
    public function __construct()
    {
        $this->shape = new ShapeShifter();
        $this->poloniex = new Poloniex();

    }

    /**
     * This method will be used by the Crontask to get the coin data and load into DB
     */
    public function processCoinData()
    {
        $this->set_ShapeShifter_Rates();
        $this->set_Poloniex_Rates();
    }

    /**
     * Sets the Poloniex Coin data in the database
     *  - Converts the BTC->ALT to ALT->BTC
     */
    public function set_ShapeShifter_Rates()
    {
        $shape_btcETH = $this->shape->getCoinData('BTC_ETH');
        $shape_btcXMR = $this->shape->getCoinData('BTC_XMR');
        $shape_btcDASH = $this->shape->getCoinData('BTC_DASH');

        $ETHbtc = 1 / $shape_btcETH['rate'];
        $XMRbtc = 1 / $shape_btcXMR['rate'];
        $DASHbtc = 1 / $shape_btcDASH['rate'];

        $db = new Prices();
        try {
            $db->setShapeShifterRate(strtoupper($shape_btcETH['pair']), round($shape_btcETH['rate'], 3), round($ETHbtc, 5), round($shape_btcETH['limit'], 3), round($shape_btcETH['minerFee'], 3));
            $db->setShapeShifterRate(strtoupper($shape_btcXMR['pair']), round($shape_btcXMR['rate'], 3), round($XMRbtc, 5), round($shape_btcXMR['limit'], 3), round($shape_btcXMR['minerFee'], 3));
            $db->setShapeShifterRate(strtoupper($shape_btcDASH['pair']), round($shape_btcDASH['rate'], 3), round($DASHbtc, 5), round($shape_btcDASH['limit'], 3), round($shape_btcDASH['minerFee'], 3));

        } catch (\PDOException $exception) {
          // Meh
        }
    }

    /**
     * Sets the Poloniex Coin data in the database
     *  - Converts the Alt->BTC to BTC->Alt
     */
    public function set_Poloniex_Rates()
    {
        $poloniex_btcETH = $this->poloniex->getCoinData('BTC_ETH');
        $poloniex_btcXMR = $this->poloniex->getCoinData('BTC_XMR');
        $poloniex_btcDASH = $this->poloniex->getCoinData('BTC_DASH');
        $poloniex_btcPASC = $this->poloniex->getCoinData('BTC_PASC');

        $ETHbtc = 1 / $poloniex_btcETH['last'];
        $XMRbtc = 1 / $poloniex_btcXMR['last'];
        $DASHbtc = 1 / $poloniex_btcDASH['last'];
        $PASCbtc = 1 / $poloniex_btcPASC['last'];

        $db = new Prices();
        try {
            $db->setPoloniexRate('BTC_ETH', round($poloniex_btcETH['last'],5), round($ETHbtc, 3));
            $db->setPoloniexRate('BTC_XMR', round($poloniex_btcXMR['last'],5), round($XMRbtc,3));
            $db->setPoloniexRate('BTC_DASH', round($poloniex_btcDASH['last'],5), round($DASHbtc,3));
            $db->setPoloniexRate('BTC_PASC', round($poloniex_btcPASC['last'],9), round($PASCbtc,3));
        } catch (\PDOException $exception) {
            // OOps
        }
    }


    /**
     * Gets the Shapeshift and Poloniex coin data and passes to the View
     */
    public function get_Shape_Poloniex_Rates()
    {

        $prices = new Prices();
        $viewData['Poloniex_PASC'] = $prices->getPoloniexRate('BTC_PASC');

        $viewData['ShapeShifter_ETH'] = $prices->getShapeShifterRate('BTC_ETH');
        $viewData['Poloniex_ETH'] = $prices->getPoloniexRate('BTC_ETH');

        $viewData['ShapeShifter_XMR'] = $prices->getShapeShifterRate('BTC_XMR');
        $viewData['Poloniex_XMR'] = $prices->getPoloniexRate('BTC_XMR');

        $viewData['ShapeShifter_DASH'] = $prices->getShapeShifterRate('BTC_DASH');
        $viewData['Poloniex_DASH'] = $prices->getPoloniexRate('BTC_DASH');

        $this->render('ShapeShifter Rates', 'coins.view', $viewData);
    }







//    public function sendEmail()
//    {
//
//        $mail = new PHPMailer();
//
//        $mail->SMTPDebug = 3;
//
//        //Set PHPMailer to use SMTP.
//        $mail->isSMTP();
//
//        $mail->Host = "smtp.gmail.com";
//
//        // Gmail SMTP requires TLS encryption
//        $mail->SMTPSecure = "tls";
//
//        // TCP Port
//        $mail->Port = 587;
//
//        //Set this to true as Gmail requires authentication to send email
//        $mail->SMTPAuth = true;
//
//        //Provide username and password
//        $mail->Username = getenv('EMAIL');
//        $mail->Password = getenv('PASSWORD');
//        $mail->FromName = "SS BTC/ETH Update";
//
//        $mail->addAddress(getenv('EMAIL_TO'));
//
//        $mail->isHTML(true);
//
//        $mail->Subject = "BTC_ETH Update";
//        $mail->Body = "<h4>Shape Shift : Bitcoin / Ether Update</h4>
//                       <pre>Rate: 1BTC = $this->rate ETH</pre>
//                       <pre>Limit: $this->limit</pre>
//                       <pre>Fee: $this->fee</pre>
//
//                       <h4>CoinCap.io (Used by ShapeShift)</h4>
//                       <pre>Bitcoin USD $$this->Coincap_BTCValueUSD</pre>
//
//                       <h4>Coinbase</h4>
//                       <pre>Bitcoin USD $$this->BTCValueUSD ($$this->BTCValueNZD NZD)</pre>
//                       <pre>Ether USD $$this->ETHValueUSD ($$this->ETHValueNZD NZD)</pre>
//
//                       <h4>CoinDesk</h4>
//                       <pre>Bitcoin USD $$this->Coindesk_BTCValueUSD</pre>
//        ";
//
//        // Sends the email
//        $mail->send();
//
//    }



}


