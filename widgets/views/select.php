<?php
    use yii\helpers\Html;
?>
<form id="currency-form" name="currency-form" method="get" action="<?=Yii::$app->request->hostInfo?>/currencyconverter/default/setcurrency">
    <?= Html::csrfMetaTags() ?>
    <select id="currency-selector" name="curr" onchange="document.getElementById('currency-form').submit()">
        <?php
        $currencies = Yii::$app->getModule('currencyconverter')->currencies;
        foreach ($currencies as $key => $value)
        {
            ?>
            <option <?php if($model == $key) echo 'selected'; ?> value="<?=$key?>"><?=$key?></option>
            <?php
        }
        ?>
    </select>
</form>
