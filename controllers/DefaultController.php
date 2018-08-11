<?php

namespace egangloff\currencyconverter\controllers;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `currencyconverter` module
 */
class DefaultController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * Set Currency
     *
     * @return mixed
     */
    public function actionSetcurrency()
    {
        Yii::$app->session['currency'] = Yii::$app->request->post('curr');
        return $this->redirect(Yii::$app->request->referrer);
    }
}
