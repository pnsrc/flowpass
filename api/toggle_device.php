<?php
// API для вывода данных о пропуске
// Path: api\get_pass.php

// Соединение с БД
include "../system/init.php";
// Получаем токен из пост запроса
$token = $_POST['token'];
// Получаем данные о пользователе по токену
    // Проверка на наличие пропуска в базе данных
    $user = R::findOne('pass', 'token = ?', array($token));
    if($user){
        // Выводим Информация для открытия двери
        echo '{ "is_valid" : "true" }';
    }else{
        // Выводим cобщением json об ошибке
        echo json_encode(array('error' => 'Пропуск не найден!'), JSON_UNESCAPED_UNICODE);
    }
?>