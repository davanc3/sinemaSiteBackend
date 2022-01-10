<?php
	require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
	$APPLICATION->SetTitle("Новости");

	use Cinema\Settings\Utils;

	print_r (Utils::testAutoload());
?>
	
<?php require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php"); ?>