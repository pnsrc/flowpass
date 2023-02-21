<?php
require 'init.php';
$otp_token = $_SESSION['_logged_user']->otp_token;
$qrCodeUrl = $ga->getQRCodeGoogleUrl('flowpass// admin code', $otp_token);
include '../pages/2fa_auth.php';
$otpfa = $_POST['2fa'];
// Выводим все данные которые пришли
if (isset($_POST['do_2fa'])) {
  $resultsCheck = $ga->verifyCode($otp_token, $otpfa, 2);
  echo $resultsCheck;
  // Проверяем верно ли введен код
  if ($resultsCheck) {
    // Если верно, то удаляем копию сессии и создаем новую
    $_SESSION['logged_user'] = $_SESSION['_logged_user'];
    unset($_SESSION['_logged_user']);
    // Редирект на главную
    echo "<script>window.location.href = '/';</script>";
  } else {
    // Если неверно, то выводим ошибку
    echo json_encode(['error' => '2fa code is incorrect'],JSON_UNESCAPED_UNICODE);
  }
};
