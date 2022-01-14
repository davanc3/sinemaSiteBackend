<?php
    // echo("<pre>");
    // print_r($arResult);
    // echo("</pre>");

    $arItems = $arResult['ITEMS'];
    $arResult['ITEMS'] = [];

    foreach ($arItems as $arItem) {
        if ($arItem['PROPERTIES']['SLIDER_FILTER']['VALUE'] == "Да") {
            $arResult['ITEMS'][] = $arItem;
        }
    }
