<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Выход");

  ob_start();
  global $USER;
  $USER->Logout();
  $new_url = '/';
  header('Location: ' . $new_url);
