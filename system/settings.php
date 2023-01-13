<?php
$otp_token = $_SESSION['_logged_user']->otp_token;
$qrCodeUrl = $ga->getQRCodeGoogleUrl('flowpass// admin code', $otp_token);

// проверяем, нажата кнопка submit-token
if (isset($_POST['submit-token'])) {
    // проверяем, существует ли переменная token
    if (isset($_POST['token'])) {
        // проверяем, не пустая ли переменная token
        if (!empty($_POST['token'])) {
            // проверяем, совпадает ли значение переменной token с токеном в сессии
            if ($_POST['token'] == $_SESSION['logged_user']->token) {
                // если совпадает, то выводим сообщение об успехе
                    // Изменяем значение toggle в БД на 0 redbeanphp
                    $user = R::load('admins', $_SESSION['logged_user']->id);
                    $user->toggle = 0;
                    R::store($user);
            } else {
            }
        } else {
        }
    } else {
    }
}

if (isset($_POST['submit-2fa'])){
    $user = R::load('admins', $_SESSION['logged_user']->id);
    $user->otp = 'true';
    R::store($user);
    unset($_SESSION['logged_user']);
    echo "<script>window.location.href = '/';</script>";
}
if (isset($_POST['dissubmit-2fa'])){
    $user = R::load('admins', $_SESSION['logged_user']->id);
    $user->otp = 'false';
    R::store($user);
    unset($_SESSION['logged_user']);
    echo "<script>window.location.href = '/';</script>";
}

?>