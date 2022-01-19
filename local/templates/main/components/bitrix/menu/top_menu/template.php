<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); ?>

<?php
if (!empty($arResult)) {?>
	<nav class="navbar navbar-fixed-top navbar-default">
        <div class="container-fluid">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#header-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <div class="navbar-header">
                <a href="#" class="navbar-brand">Кинотеатр</a>                
            </div>
            <div class="collapse navbar-collapse" id="header-menu">
                <ul class="nav navbar-nav">
					<?php
						foreach ($arResult as $key=>$arItem) {
					?>
						<li class=""><a href="<?= $arItem['LINK'] ?>"><?= $arItem['TEXT'] ?></a></li>
					<?php
						}
					?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li <?= $USER->IsAuthorized() ? '' : 'style="display: none"' ?>><a href="/profile/"><i class="bi bi-person"></i>Профиль</a></li>
                    <li <?= $USER->IsAuthorized() ? 'style="display: none"' : '' ?>><a id="login"><i class="bi bi-person"></i>Вход</a></li>
                    <li <?= $USER->IsAuthorized() ? 'style="display: none"' : '' ?>><a id="registration"><i class="bi bi-person-plus"></i>Регистрация</a></li>
                </ul>
            </div>
        </div>
    </nav> 
<?php 
}
 