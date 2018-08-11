<?php
/**
 * Created by PhpStorm.
 * User: Eddy Gangloff
 * Date: 8/3/2018
 * Time: 2:58 PM
 */

namespace egangloff\currencyconverter\models;

use lajax\translatemanager\helpers\Language;
use Yii;

/**
 * This is the model class for table "currency".
 *
 * @property int $id
 * @property string $rates
 *
 */
class Currency extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'currency';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rates'], 'required'],
            [['rates'], 'string'],
        ];

    }

}