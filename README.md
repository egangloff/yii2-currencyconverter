# yii2-currencyconverter

A Yii2 currency converter, based on Fixer.io API 

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist egangloff/yii2-currencyconverter "dev-master"
```

or add

```
"egangloff/yii2-currencyconverter": "dev-master"
```

to the require section of your `composer.json` file.

## Configuration

Config *console* modules in `console/config/main.php`

```
'bootstrap' => ['currencyconverter'],
'modules' => [
    'currencyconverter' => [
        'class' => 'egangloff\currencyconverter\CurrencyConverter',
        'access_key' => 'FIXER.IO API KEY',
        'currencies' => [
		'THB'=>'&#3647;', 
		'USD'=>'&#036;', 
		'EUR'=>'&euro; ',
		'CNY'=>'&yen;',
    ...
	],
        'currency_source' => 'THB',
    ],
],
```

Config *frontend* modules and components in `frontend/config/main.php`

```
'modules' => [
    'currencyconverter' => [
        'class' => 'egangloff\currencyconverter\CurrencyConverter',
        'access_key' => '65f8a33df94db762f137e4c7be2bb617',
        'currencies' => [
		'THB'=>'&#3647;', 
		'USD'=>'&#036;', 
		'EUR'=>'&euro; ',
		'CNY'=>'&yen;',
    ...
	],
        'currency_source' => 'THB',
    ],
],
'components' => [
    'currencyconverter' => [
        'class' =>  'common/modules/currencyconverter/components/CurrencyConverter',
    ]
],
```

## Migration

```
./yii migrate --migrationPath=@vendor/egangloff/yii2-currencyconverter/migrations
```

## Usage

### Currency Converter Component

in your controller or view

```
use egangloff\currencyconverter\components\CurrencyConverter;

<?=CurrencyConverter::convert(YOUR_AMOUNT)?>

```

### Currrency Selector Widget

Copy and change CSS in frontend/web/css/site.css

```
/* Currency Selector Widget */

.currency{
    text-align: center;
}

#currency-selector{
    margin: 15px;
    background-color: #337AB7;
    color: #fff;
    border: 0;
    -webkit-appearance: none;
    -moz-appearance: none;
}
```

in your view

```
use egangloff\currencyconverter\widgets\CurrencySelector;

<?=CurrencySelector::widget()?>

```
