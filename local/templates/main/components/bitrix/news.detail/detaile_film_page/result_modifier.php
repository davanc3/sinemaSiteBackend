<?php

use Cinema\Settings\Utils;

$iblockId = Utils::getIblockIdByCode('session');

$arOrder = [
    'PROPERTY_DATE' => 'ASC'
];
$arFilter = [
    'IBLOCK_ID' => $iblockId,
    'PROPERTY_FILM' => $arResult['ID'],
];

$arSelect = [
    'ID',
    'PROPERTY_DATE'
];

$rsResult = \CIBlockElement::getList($arOrder, $arFilter, false, [], $arSelect);

while ($elements = $rsResult->fetch()) {
    $arResult['SEANCES'][$elements['ID']] = $elements;
    $arResult['SEANCES'][$elements['ID']]['PROPERTY_DATE_VALUE'] = translateMonthNames(date('j F G:i', strtotime($elements['PROPERTY_DATE_VALUE'])));
}

$cp = $this->__component;
if (is_object($cp)) {
    $cp->arResult['SEANCES'] = $arResult['SEANCES'];
    $cp->arResult['PRICE'] = $arResult['PROPERTIES']['PRICE']['VALUE'];
    $cp->SetResultCacheKeys(['SEANCES', 'PRICE']);
}

// echo("<pre>");
// print_r($arResult);
// echo("</pre>");

function translateMonthNames($str) {
    $replace = [
        'January' => 'Января',
        'February' => 'Февраля',
        'March' => 'Марта',
        'April' => 'Апреля',
        'May' => 'Мая',
        'June' => 'Июня',
        'July' => 'Июля',
        'August' => 'Августа',
        'September' => 'Сентября',
        'October' => 'Октября',
        'November' => 'Ноября',
        'December' => 'Декабря'
    ];

    return strtr($str, $replace);
}
