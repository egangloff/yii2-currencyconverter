<?php
/**
 * Created by PhpStorm.
 * User: Eddy
 * Date: 8/9/2018
 * Time: 4:08 PM
 */
namespace egangloff\currencyconverter\commands;

use yii;
use yii\console\Controller;
use yii\helpers\Console;
use egangloff\currencyconverter\models\Currency;

class ConsoleController extends Controller
{
    public function actionUpdate()
    {
        $access_key = Yii::$app->getModule('currencyconverter')->access_key;
        $currencies = ['EUR', 'USD', 'THB', 'CNY'];

        // Initialize CURL:
        $ch = curl_init('http://data.fixer.io/api/latest?access_key=' . $access_key);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $exchangeRates = json_decode($json, true);
        foreach ($currencies as $currency)
        {
            $rates[$currency] = $exchangeRates['rates'][$currency];
        }

        $model = new Currency();
        $model->rates = serialize($rates);
        if($model->save())
            echo date("Y-m-d H:i:s") . " : Toucan Property Currency rates has been updated \n";
        else
            echo date("Y-m-d H:i:s") . " : Toucan Property Error during Currency rates update \n";
    }
}