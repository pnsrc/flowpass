<?php
require "components/rb.php";
require 'components/otp.php';
$ga = new PHPGangsta_GoogleAuthenticator();

$db_username 		= 'root'; //database username
$db_password 		= ''; //dataabse password
$db_name 			= 'pass'; //database name
$db_host 			= 'localhost'; //hostname or IP


// проверяем, если host не localhost то включаем режим отладки
if($_SERVER['HTTP_HOST'] == 'work.flow' || $_SERVER['HTTP_HOST'] == 'localhost'){
    R::setup('mysql:host='. $db_host .';dbname='. $db_name, $db_username, $db_password);
} else {
    R::setup('mysql:host=localhost;dbname=u1846532_default', 'u1846532_default', '9f0Lk69DuVcTvTUI');

}

// Проверка подключения к БД
if (!R::testConnection()) {
    // Если подключение не удалось, то выводим ошибку в формате JSON
    echo json_encode(array(
        'error' => 'Ошибка подключения к БД'
    ), JSON_UNESCAPED_UNICODE);
}


session_start();
