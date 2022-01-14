<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<wrapper>
	<div id="dws-slider" class="carousel slide carousel-fade" data-ride="carousel">
		<!--Показатели-->
		<ol class="carousel-indicators">
			<?php
				for ($i = 0; $i < count($arResult['ITEMS']); $i++) {
			?>
					<li data-target="#dws-slider" data-slide-to="<?= $i ?>" <?= $i == 0 ? 'class="active"' : '' ?>></li>
			<?php
				}
			?>
		</ol>        
		<!--Обертка для слайдов-->
		<div class="carousel-inner" role="listbox">
			<?php
				$flag = array_key_first($arResult['ITEMS']);
				foreach ($arResult['ITEMS'] as $key => $arItem) {
			?>
				<div class="item <?= $flag == $key ? 'active' : '' ?>"><img src="<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>"  alt="<?= $arItem['PREVIEW_PICTURE']['ALT'] ?>">
					<div class="carousel-caption">
						<h3 class="text-uppercase"><?= $arItem['NAME'] ?></h3>
						<p style="text-overflow: ellipsis;"><?= $arItem['PREVIEW_TEXT'] ?></p>
					</div>
				</div>
			<?php
				}
			?>
		</div>        
		<!--Элементы управления-->
		<a class="left carousel-control" href="#dws-slider" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#dws-slider" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</wrapper>




