<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)) {?>
	<nav class="navbar navbar-fixed-top navbar-default" <?php if ($USER->GetID() == 1) echo ('style="position: relative;"'); ?>>
        <div class="container-fluid">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#header-menu">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <div class="navbar-header">
                <a href="#" class="navbar-brand"><?php $APPLICATION->ShowTitle(); ?></a>                
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
                    <li><a href="#"><i class="bi bi-person"></i>Вход</a></li>
                    <li><a href="#"><i class="bi bi-person-plus"></i>Регистрация</a></li>
                </ul>
            </div>
        </div>
    </nav> 
<?php 
}
 