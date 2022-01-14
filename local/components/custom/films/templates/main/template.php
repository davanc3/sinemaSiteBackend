<?php
    if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
        die();
    }
    if ($arResult['GENRE_FILTER']) {
        $GLOBALS['APPLICATION']->RestartBuffer();
        if (!isset($arResult['ITEMS'])) {
            echo('<h3>К сожалению, по данному запросу ничего не найдено!</h3>');
        }
        
    }
    // use Cinema\Settings\Utils;

    // Utils::printArray($arResult);
?>

    <?php
        foreach ($arResult['ITEMS'] as $arItem) {
    ?>
        <a href="/timetable/<?= $arItem['CODE'] ?>/" class="film-card">
            <div class="film-title-image">
                <img src="<?= $arItem['PREVIEW_PICTURE'] ?>" alt="">
            </div>
            <p class="film-description">
                <span class="film-title"><?= $arItem['NAME'] ?></span>
            </p>
        </a>
    <?php
        } 
    ?>
<?php
    if ($arResult['GENRE_FILTER']) {
        die;
    }