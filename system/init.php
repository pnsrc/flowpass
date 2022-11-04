<?php
require "components/rb.php";
R::setup('mysql:host=localhost;dbname=pass', 'root', '');


// Проверка подключения к БД
if (!R::testConnection()) {
    // Если подключение не удалось, то выводим ошибку в формате JSON
    echo json_encode(array(
        'error' => 'Ошибка подключения к БД'
    ), JSON_UNESCAPED_UNICODE);
}


session_start();
