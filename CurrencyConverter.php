<?php

namespace egangloff\currencyconverter;

use yii;
/**
 * currencyconverter module definition class
 */
class CurrencyConverter extends \yii\base\Module implements \yii\base\BootstrapInterface
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'egangloff\currencyconverter\controllers';

    public $access_key;
    public $currencies = [];
    public $currency_source;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        //Yii::configure($this, require(__DIR__ . '/config.php'));
        //var_dump($this);
        // custom initialization code goes here
    }

    public function bootstrap($app)
    {
        if ($app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'egangloff\currencyconverter\commands';
        }
    }
}
