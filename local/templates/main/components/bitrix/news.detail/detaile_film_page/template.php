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

use Cinema\Settings\Utils;
use Cinema\Helpers\FilmsHelper;

// Utils::printArray($arResult);
?>

<div class="container-fluid margin">
	<div class="container-film">
		<div class="container-image">
			<div class="title-image">
				<img src="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>" alt="">
			</div>
			<div class="trailer">
				<iframe src="<?= CFile::GetPath($arResult['PROPERTIES']['TRAILER']['VALUE']) ?>" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<div class="container-info">
			<div class="title">
				<h1> <?= $arResult['NAME'] ?> </h1>
			</div>
			<div class="description">
				<p><?= $arResult['PREVIEW_TEXT'] ?></p>
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

<!-- Popup -->
	<div class="overlay" id="popup-overlay">
        <div class="popup">
            <div class="popup-content">
                <h1>Название фильма</h1>                
                <h9>Цена билета: 100 руб.</h9>                        
                <h3>Выбрете дату:</h3> 
                <form action="" class="booking-form">
                    <input type="date">
                    <input type="time">
                    <h3>Места:</h3>
                    <div class="booking-table">  
                        <table>
                            <tr>
                                <td>1</td>
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">1</span>    
                                    </label> 
                                </td>
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">2</span>    
                                    </label> 
                                </td>
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">3</span>    
                                    </label> 
                                </td>
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="" disabled>
                                        <span class="checkbox">4</span>    
                                    </label> 
                                </td>   
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">5</span>    
                                    </label> 
                                </td>  
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">6</span>    
                                    </label> 
                                </td>  
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="" disabled>
                                        <span class="checkbox">7</span>    
                                    </label> 
                                </td>        
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="" disabled>
                                        <span class="checkbox">8</span>    
                                    </label> 
                                </td>      
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">9</span>    
                                    </label> 
                                </td>     
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="" disabled>
                                        <span class="checkbox">10</span>    
                                    </label> 
                                </td>                            
                            </tr>    
                            <tr>
                                <td>2</td>
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">1</span>    
                                    </label> 
                                </td>
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">2</span>    
                                    </label> 
                                </td>
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">3</span>    
                                    </label> 
                                </td>
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="" disabled>
                                        <span class="checkbox">4</span>    
                                    </label> 
                                </td>   
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">5</span>    
                                    </label> 
                                </td>  
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">6</span>    
                                    </label> 
                                </td>  
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">7</span>    
                                    </label> 
                                </td>        
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="" disabled>
                                        <span class="checkbox">8</span>    
                                    </label> 
                                </td>        
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="" disabled>
                                        <span class="checkbox">9</span>    
                                    </label> 
                                </td>     
                                <td>
                                    <label class="check">
                                        <input type="checkbox" name="" id="">
                                        <span class="checkbox">10</span>    
                                    </label> 
                                </td>                               
                            </tr>                                     
                        </table>                     
                    </div>
                    <h9> 1 билет: 100 руб. </h9>
                    <input type="submit" value="Купить">
                </form>
            </div>
            <div class="bi bi-x popup-close" id="popup-close"></div> 
        </div>
    </div>