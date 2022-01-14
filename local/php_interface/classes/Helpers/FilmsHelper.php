<?php

namespace Cinema\Helpers;

use Cinema\Settings\Utils;

class FilmsHelper
{
    /**
     * Получение массива фильмов
     * 
     * @return array
     */
    public static function getFilms(int $genreId = null, string $date = null, string $state = null): array
    {
        $IBlockId = Utils::getIblockIdByCode('films');
        $resultArray = [];

        $arFilter = [
            'IBLOCK_ID' => $IBlockId,
            '<=DATE_ACTIVE_FROM' => [false, ConvertTimeStamp(false, 'FULL')],
            '>=DATE_ACTIVE_TO' => [false, ConvertTimeStamp(false, 'FULL')],
        ];
        if (isset($state) && $state == 'soon') {
            unset($arFilter['>=DATE_ACTIVE_TO']);
            unset($arFilter['<=DATE_ACTIVE_FROM']);
            $arFilter['>DATE_ACTIVE_FROM'] = [false, ConvertTimeStamp(false)];
        }
        if (isset($date)) {
            $arFilter['<=DATE_ACTIVE_FROM'] = [false, ConvertTimeStamp(strtotime($date))];
            $arFilter['>=DATE_ACTIVE_TO'] = [false, ConvertTimeStamp(strtotime($date))];
        }
        if (isset($genreId)) {
            if ($genreId != -1){
                $arFilter['PROPERTY_GENRES'] = $genreId;
            }
            $resultArray['GENRE_FILTER'] = 1;
        }
        
        $arSelect = [
            'ID',
            'NAME',
            'CODE',
            'PREVIEW_PICTURE'
        ];

        $rsResult = \CIBlockElement::getList([], $arFilter, false, [], $arSelect);

        while ($arResult = $rsResult->fetch()) {
            $resultArray['ITEMS'][$arResult['ID']] = $arResult;
            $resultArray['ITEMS'][$arResult['ID']]['PREVIEW_PICTURE'] = \CFile::getPath($arResult['PREVIEW_PICTURE']);
        }

        return $resultArray;
    }

    /**
     * Получение массива жанров фильмов
     * 
     * @return array
     */
    public static function getFilmsGenres(): array
    {
        $IBlockId = Utils::getIblockIdByCode('genre');
        
        $arFilter = [
            'IBLOCK_ID' => $IBlockId
        ];
        $arSelect = [
            'ID',
            'NAME'
        ];

        $rsResult = \CIBlockElement::getList([], $arFilter, false, [], $arSelect);

        while ($arResult = $rsResult->fetch()) {
            $resultArray[$arResult['ID']] = $arResult;
        }

        return $resultArray;
    }

    /**
     * Получение названия жанра фильма по его id
     * 
     * @param int
     * @return string
     */
    public static function getGenreNameById(int $genreId): string
    {
        $IBlockId = Utils::getIblockIdByCode('genre');

        $arFilter = [
            'IBLOCK_ID' => $IBlockId,
            'ID' => $genreId
        ];

        $arSelect = [
            'NAME'
        ];

        $rsResult = \CIBlockElement::getList([], $arFilter, false, [], $arSelect);

        $genreName = $rsResult->fetch()['NAME'];

        return $genreName;
    } 
}