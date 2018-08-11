<?php
/**
 * Created by PhpStorm.
 * User: Eddy Gangloff
 * Date: 8/3/2018
 * Time: 3:29 PM
 */

namespace egangloff\currencyconverter\components;

use Yii;
use yii\base\Component;
use egangloff\currencyconverter\models\Currency;
use yii\i18n\Formatter;

class CurrencyConverter extends Component
{
    public function init()
    {
        parent::init();
    }

    public static function convert($amount) {
        if(isset(Yii::$app->session['currency']) and Yii::$app->session['currency'] != Yii::$app->getModule('currencyconverter')->currency_source)
        {
            $symbol = Yii::$app->getModule('currencyconverter')->currencies[Yii::$app->session['currency']];
            $model = Currency::find()
                ->orderBy(['id' => SORT_DESC])
                ->one();
            $rates = unserialize($model->rates);
            $eur = $amount / $rates[Yii::$app->formatter->currencyCode];
            $target = $eur * $rates[Yii::$app->session['currency']];
            return $symbol . ' ' . Yii::$app->Formatter->format($target, 'integer');
        }
        else{
            $symbol = Yii::$app->getModule('currencyconverter')->currencies[Yii::$app->getModule('currencyconverter')->currency_source];
            return $symbol . ' ' .Yii::$app->Formatter->format($amount, 'integer');
        }
    }
}