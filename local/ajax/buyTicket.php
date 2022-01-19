<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

global $USER;
if ($USER->IsAuthorized() != 1) {
    $status = [
        'status' => 'unregister'
    ];
    echo(json_encode($status));
    die;
}

use Bitrix\Main\Application;
use Cinema\Settings\Utils;

$request = Application::getInstance()->getContext()->getRequest();

$iblockId = Utils::getIblockIdByCode('tickets');

$row = $request->get('row');
$place = $request->get('place');
$seance = $request->get('seance');

$PROP = [
    'USER' => $USER->GetID()
];

if (isset($row)) {
    $PROP['ROW'] = $row;
}
if (isset($place)) {
    $PROP['PLACE'] = $place;
}
if (isset($seance)) {
    $PROP['SESSION'] = $seance;
}

$el = new CIBlockElement;
$arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
    "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
    "IBLOCK_ID"      => $iblockId,
    "PROPERTY_VALUES"=> $PROP,
    "NAME"           => "Билет",
    "ACTIVE"         => "Y",            // активен
);
if ($ID = $el->Add($arLoadProductArray)) {
    $status = [
        'status' => 'success'
    ];
    echo(json_encode($status));
} else {
    $status = [
        'status' => 'error'
    ];
    echo(json_encode($status));
}
