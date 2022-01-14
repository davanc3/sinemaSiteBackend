<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
    // use Cinema\Settings\Utils;

    // Utils::printArray($arResult);
    // dump($arResult);
?>

<div class="container-filtr">
    <form class="filtr" action="/" id='filtr' >
        <div class="select">
            <select name="" id="stateFilms">
                <option value="active">Уже в кино</option>
                <option value="soon">Скоро в кино</option>
            </select>       
        </div>         
        <input type="date" id="date" min="">
        <div class="select">
            <select name="genre" id="genre">
                <option value='-1'>Все</option>
                <?php
                    foreach ($arResult as $arItem) {
                ?>
                    <option value="<?= $arItem['ID'] ?>"><?= $arItem['NAME'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
        <a class="reset" id="reset">Сбросить</a>
    </form>
</div>