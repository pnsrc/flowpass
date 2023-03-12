<?php
require 'init.php';
$otp_token = $_SESSION['_logged_user']->otp_token;
$qrCodeUrl = $ga->getQRCodeGoogleUrl('flowpass// admin code', $otp_token);

$otpfa = $_POST['2fa'];
// Выводим все данные которые пришли

$resultsCheck = $ga->verifyCode($otp_token, $otpfa, 2);

// Проверяем верно ли введен код
if ($resultsCheck) {
  // Если верно, то удаляем копию сессии и создаем новую
  $_SESSION['logged_user'] = $_SESSION['_logged_user'];
  unset($_SESSION['_logged_user']);
  // Редирект на главную
  $message = 'Авторизация прошла успешно!';
} else {
  // Если неверно, то выводим ошибку
  $message = "Код не совпадает";
}

$response = array("message" => $message);
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
