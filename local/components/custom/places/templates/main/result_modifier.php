<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Cinema\Settings\Utils;
use \Bitrix\Main\Application; 

$request = Application::getInstance()->getContext()->getRequest();
$seance = $request->get('seance');

$iblockId = Utils::getIblockIdByCode('tickets');

$arFilter = [
    'IBLOCK_ID' => $iblockId
];



if (isset($seance)) {
    $arFilter['PROPERTY_SESSION'] = $seance;
    $arResult['SEANCE'] = $seance;
} else {
    $arFilter['PROPERTY_SESSION'] = array_shift($arParams['SEANCE'])['ID'];
}

$arSelect = [
    'ID',
    'PROPERTY_ROW',
    'PROPERTY_PLACE'
];

$result = CIBlockElement::getList([], $arFilter, false, [], $arSelect);

while ($element = $result->fetch()) {
    $arResult['ITEMS'][$element['ID']] = $element;
}
