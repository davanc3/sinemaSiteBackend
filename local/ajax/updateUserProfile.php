<?php
require($_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php');

use Bitrix\Main\Application;

$request = Application::getInstance()->getContext()->getRequest();

$phone = $request->get('phone');
$password = $request->get('password');
$confirmPassword = $request->get('confirmPassword');
$email = $request->get('email');

$resultArray = [];

if (isset($phone)) {
    $resultArray['PERSONAL_PHONE'] = $phone;
}
if (isset($password)) {
    $resultArray['PASSWORD'] = $password;
}
if (isset($confirmPassword)) {
    $resultArray['CONFIRM_PASSWORD'] = $confirmPassword;
}
if (isset($email)) {
    $resultArray['EMAIL'] = $email;
}

global $USER;
$user = new CUser;

if ($user->Update($USER->GetID(), $resultArray)) {
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