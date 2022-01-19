<?php

namespace Cinema\Helpers;

use Cinema\Settings\Utils;
use Cinema\Helpers\FilmsHelper;

class ProfileHelper
{
    /**
     * Получает всю информацию пользователя по ID
     */
    public static function getInfoUserById (int $userId): array
    {
        $resultArray = [];

        $rsUser = \CUser::GetByID($userId);
        $arUser = $rsUser->fetch();
        $arUser['PERSONAL_PHOTO'] = \CFile::GetPath($arUser['PERSONAL_PHOTO']);

        $resultArray['USER'] = $arUser;

        $iblockId = Utils::getIblockIdByCode('tickets');

        $arFilter = [
            'IBLOCK_ID' => $iblockId,
            'PROPERTY_USER' => $userId
        ];

        $arSelect = [
            'ID',
            'PROPERTY_SESSION',
            'PROPERTY_ROW',
            'PROPERTY_PLACE',
            'PROPERTY_FILM'
        ];

        $result = \CIBlockElement::getList([], $arFilter, false, [], $arSelect);
        while ($element = $result->fetch()) {
            $resultArrayUnsort['TICKETS'][$element['ID']] = $element;
        }

        foreach ($resultArrayUnsort['TICKETS'] as $key => $value) {
            $seanceId = $resultArrayUnsort['TICKETS'][$key]['PROPERTY_SESSION_VALUE'];
            if (!isset($resultArray['SEANCE'][$seanceId])) {
                $resultArray['SEANCE'][$seanceId]['SEANCE_DATE'] = FilmsHelper::getSeanceDateById($seanceId);
                $resultArray['SEANCE'][$seanceId]['FILM'] = FilmsHelper::getFilmNameAndPriceById($value['PROPERTY_FILM_VALUE']);
                foreach ($resultArrayUnsort['TICKETS'] as $key => $value) {
                    if ($resultArrayUnsort['TICKETS'][$key]['PROPERTY_SESSION_VALUE'] == $seanceId) {
                        $resultArray['SEANCE'][$seanceId]['TICKETS'][$key] = $value;
                    }
                }
            }

        }        

        return $resultArray;
    }
}