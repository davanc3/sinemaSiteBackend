<?php if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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

use Cinema\Settings\Utils;
use Cinema\Helpers\FilmsHelper;

// Utils::printArray($arResult);
// echo("<pre>");
// print_r($arResult);
// echo("</pre>");
?>

<div class="container-fluid">
	<div class="container-film">
		<div class="container-image">
			<div class="title-image">
				<img src="<?= $arResult['DETAIL_PICTURE']['SRC'] ?>" alt="">
			</div>
			<div class="trailer">
				<video src="<?= CFile::GetPath($arResult['PROPERTIES']['TRAILER']['VALUE']) ?>" controls></video>
			</div>
		</div>
		<div class="container-info">
			<div class="title">
				<h1> <?= $arResult['NAME'] ?> </h1>
			</div>
			<div class="description">
				<p><?= $arResult['DETAIL_TEXT'] ?></p>
				<table class="about-film">
					<tr>
						<td class="warp-td">Жанр:</td>
						<td class="warp-td">
						<?php
							$lastElement = array_key_last($arResult['PROPERTIES']['GENRES']['VALUE']);
							foreach ($arResult['PROPERTIES']['GENRES']['VALUE'] as $key => $arGenre) {
								if ($key == $lastElement) {
									print(FilmsHelper::getGenreNameById($arGenre));
								} else {
									print(FilmsHelper::getGenreNameById($arGenre) . ", ");
								}
							}
						?>
						</td>
					</tr>      
					<tr>
						<td class="warp-td">Режисер</td>
						<td class="warp-td"><?= $arResult['PROPERTIES']['DIRECTOR']['VALUE'] ?></td>
					</tr>
					<tr>
						<td class="warp-td">В главных ролях</td>
						<td class="warp-td">
						<?php
							$lastElement = array_key_last($arResult['PROPERTIES']['ACTORS']['VALUE']);
							foreach ($arResult['PROPERTIES']['ACTORS']['VALUE'] as $key => $arActor) {
								if ($key == $lastElement) {
									print($arActor);
								} else {
									print($arActor . ", ");
								}
							}
						?>
						</td>
					</tr>
                    <tr>
						<td class="warp-td">Время</td>
						<td class="warp-td"><?= $arResult['PROPERTIES']['TIME']['VALUE'] . " мин" ?></td>
					</tr>
				</table>
				<div class="booking" id="popup-open">
					<p>Заказать билет</p>
				</div>
			</div>
		</div>
		
	</div>

	<?php 
		if ($arResult['PROPERTIES']['STILLS']['VALUE'] != "") {
	?>
	<!--Слайдер-->
	<wrapper>
		<div id="dws-slider" class="carousel slide carousel-fade" data-ride="carousel">
			<!--Показатели-->
			<ol class="carousel-indicators">
			<?php
				for ($i = 0; $i < count($arResult['PROPERTIES']['STILLS']['VALUE']); $i++) {
			?>
					<li data-target="#dws-slider" data-slide-to="<?= $i ?>" <?= $i == 0 ? 'class="active"' : '' ?>></li>
			<?php
				}
			?>
			</ol>        
			<!--Обертка для слайдов-->
			<div class="carousel-inner" role="listbox">
			<?php
				$flag = array_key_first($arResult['PROPERTIES']['STILLS']['VALUE']);
				foreach ($arResult['PROPERTIES']['STILLS']['VALUE'] as $key => $arStill) {
			?>
				<div class="item <?= $flag == $key ? 'active' : '' ?>"><img src="<?= CFile::GetPath($arStill) ?>"  alt=""></div>
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
	<?php } ?>
</div>