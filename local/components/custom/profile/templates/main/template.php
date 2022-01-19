<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
// echo("<pre>");
// print_r($arResult);
// echo("</pre>");
?>
<div class="settings" id="settings">
    <h2>Настройки</h2>
    <div class="setting-items">
        <div class="setting-item">
            <div class="setting-line" id="setting-line-email">
                <h5>Электронная почта</h5>
                <div class="info email"><?= $arResult['USER']['EMAIL'] ?></div> 
                <a id="button-open-email" onclick="openForm('email')">Изменить</a>
            </div>
            <form action="" class="form-change" id="form-change-email">
                <div>                                     
                    <span>Новая почта</span>
                    <input id="emailSettings" type="email" pattern="\S+@[a-z]+.[a-z]+" required>
                </div>
                <div class="button-form">
                    <a id="saveEmail">Сохранить</a>
                </div>
            </form>
        </div>
        <div class="setting-item">
            <div class="setting-line" id="setting-line-password">
                <h5>Пароль</h5>
                <div class="info">
                </div> 
                <a id="button-open-password" onclick="openForm('password')">Изменить</a>
            </div>
            <form action="" class="form-change" id="form-change-password">
                <div>                                     
                    <span>Новый пароль</span>
                    <input id="passwordSettings" type="password" required>
                </div>
                <div style="margin-top:20px;">                                     
                    <span>Подтвердить новый пароль</span>
                    <input id="confirmPasswordSettings" type="password" required>
                </div>
                <div class="button-form">
                    <a id="savePassword">Сохранить</a>
                </div>
            </form>
        </div>
        <div class="setting-item">
            <div class="setting-line" id="setting-line-tel">
                <h5>Телефон</h5>
                <div class="info phone"><?= $arResult['USER']['PERSONAL_PHONE'] ?></div> 
                <a id="button-open-tel" onclick="openForm('tel')">Изменить</a>
            </div>
            <form action="" class="form-change" id="form-change-tel">
                <div>                                     
                    <span>Новый телефон</span>
                    <input type="tel" id="phoneSettings" title="Введите правильный номер телефона" required>
                </div>
                <div class="button-form">
                    <a id="savePhone">Сохранить</a>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="history-order table-responsive active" id="history-order">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Название фильма</th>
                <th>Место</th>
                <th>Дата</th>
                <th>Цена</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($arResult['SEANCE'] as $arSeance) {  
            ?>
            <tr>
                <td><?= $arSeance['FILM']['NAME'] ?></td>
                <td>
                    <?php
                    foreach ($arSeance['TICKETS'] as $arTicket) {
                    ?>
                    <p><?= $arTicket['PROPERTY_ROW_VALUE'] ?> ряд <?= $arTicket['PROPERTY_PLACE_VALUE'] ?> место</p>
                    <?php
                    }
                    ?>
                </td>
                <td><?= $arSeance['SEANCE_DATE'] ?></td>
                <td><?= $arSeance['FILM']['PRICE'] * count($arSeance['TICKETS']) ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>