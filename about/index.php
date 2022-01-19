<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("О нас");
?><!-- MainContent -->
<div class="container-fluid">
	<div class="container-aboutus">
		<div class="title">
			<h1>Кинотеатр "Общежитие №6"</h1>
		</div>
		<div class="description">
			<h2>О нас</h2>
			 <?php
			 $APPLICATION->IncludeComponent(
				"bitrix:main.include",
				"",
				Array(
					"AREA_FILE_SHOW" => "file",
					"AREA_FILE_SUFFIX" => "inc",
					"EDIT_TEMPLATE" => "",
					"PATH" => "about_inc.php"
				)
			);
			?>
		</div>
		<div class="find-us">
			<h2>Как найти нас</h2>
			<div class="container-info-about">
				<div class="map">
					 <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A56b05d27b1b7a11b17cd277722490f734e3cc23e2656d59e39e467d49734395b&amp;width=100%25&amp;height=450&amp;lang=ru_RU&amp;scroll=true"></script>
				</div>
				<div class="find-us-info">
					<table>
					<tbody>
					<tr>
						<td class="warp-td">
							 Город
						</td>
						<td class="warp-td">
							Владимир
						</td>
					</tr>
					<tr>
						<td class="warp-td">
							 Улица
						</td>
						<td class="warp-td">
							Проспект Стоителей
						</td>
					</tr>
					<tr>
						<td class="warp-td">
							 Дом
						</td>
						<td class="warp-td">
							7Г
						</td>
					</tr>
					<tr>
						<td class="warp-td">
							 Остановка
						</td>
						<td class="warp-td">
							Студенческий городок
						</td>
					</tr>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
 <br>