<?php
namespace egangloff\currencyconverter\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class CurrencySelector extends Widget
{

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $model = isset(Yii::$app->session['currency']) ? Yii::$app->session['currency'] : Yii::$app->getModule('currencyconverter')->currency_source;
        return $this->render('select', [
                'model' => $model
            ]
        );
    }
}