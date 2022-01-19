<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();

$login = $request->get('login');
$password = $request->get('password');
$email = $request->get('email');
$phone = $request->get('phone');

$arFields = Array(
    "EMAIL"             => $email,
    "LOGIN"             => $login,
    "ACTIVE"            => "Y",
    "PASSWORD"          => $password,
    "PERSONAL_PHONE"    => $phone
);
// echo("<pre>");
// print_r($arFields);
// echo("</pre>");

$user = new CUser;

$ID = $user->add($arFields);

if (is_numeric($ID)) {
    $user = new CUser;
    if ($user->Login($login, $password, 'Y')) {
        $status = [
            'status' => 'success'
        ];
        echo(json_encode($status));
    } else {
        $status = [
            'status' => 'error'
        ];
        echo(json_encode($status));
    }
    
} else {
    $status = [
        'status' => 'error'
    ];
    echo(json_encode($status));
}
