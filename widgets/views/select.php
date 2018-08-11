<?php
    use yii\helpers\Html;
?>
<form id="currency-form" name="currency-form" method="post" action="<?=Yii::$app->request->hostInfo?>/currencyconverter/default/setcurrency">
    <?= Html::csrfMetaTags() ?>
    <select id="currency-selector" name="curr" onchange="document.getElementById('currency-form').submit()">
        <?php
        $currencies = Yii::$app->getModule('currencyconverter')->currencies;
        foreach ($currencies as $key => $value)
        {
            ?>
            <option value="<?=$key?>"><?=$key?></option>
            <?php
        }
        ?>
    </select>
</form>
<script type="text/javascript">
    document.getElementById('currency-selector').value = '<?=$model?>';
</script>
