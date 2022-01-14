<?php

namespace Cinema\Settings;

use \Bitrix\Iblock\IblockTable;
use \Bitrix\Iblock\SectionTable;
use \Bitrix\Iblock\ElementTable;
\Bitrix\Main\Loader::includeModule('main');
\Bitrix\Main\Loader::includeModule('iblock');

class Utils
{
    /**
     * Распечатка массива
     */
    public static function printArray ($array) 
    {
        echo("<pre>");
        print_r($array);
        echo("</pre>");
    }

    /**
     * Получение ID инфоблока по коду
     *
     * @param  string $iblockCode
     * @return int
     */
    public static function getIblockIdByCode(string $iblockCode): int
    {
        $result = 0;

        if (!$iblockCode) {
            return $result;
        }

        $getListArray['filter'] = ['CODE' => $iblockCode];
        $iblockRes = IblockTable::getList($getListArray);

        if ($iblock = $iblockRes->fetch()) {
            $result = $iblock['ID'];
        }

        return (int)$result;
    }
}