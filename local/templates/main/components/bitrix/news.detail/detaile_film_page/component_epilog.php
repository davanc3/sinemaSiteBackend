<?php
    if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) {
        die();
    }
    // echo("<pre>");
    // print_r($arResult['SEANCES']);
    // echo("</pre>");
?>
<!-- Popup -->
<div class="overlay" id="popup-overlay">
        <div class="popup">
            <div class="popup-content">
                <h1><?= $arResult['NAME'] ?></h1>                
                <h9>Цена билета: <span id="seancePrice"><?= $arResult['PRICE'] ?></span> руб.</h9>                        
                <h3>Выбрете сеанс:</h3> 
                <form action="" class="booking-form">
                    <select name="seanceSelect" id="seanceSelect">
                        <?php
                        foreach ($arResult['SEANCES'] as $arItem) {
                        ?>
                            <option value="<?= $arItem['ID'] ?>"><?= $arItem['PROPERTY_DATE_VALUE'] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                    <h3>Места:</h3>
                    <div class="booking-table">  
                    <?php
					$APPLICATION->includeComponent(
						'custom:places',
						'main',
						[
                            'SEANCE' => $arResult['SEANCES']
                        ]
					);
					?>
                    </div>
                    <h9 class="priceForTickets" style="display: none"> 1 билет: 100 руб. </h9>
                    <input id="buyTickets" type="submit" value="Купить">
					<input id="curUrl" style="display: none" value="<?= $APPLICATION->GetCurUri() ?>">
                </form>
            </div>
            <div class="bi bi-x popup-close" id="popup-close"></div> 
        </div>
    </div>