<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();

$login = $request->get('login');
$password = $request->get('password');

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
