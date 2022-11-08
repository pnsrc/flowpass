<?php
// Получение информации о пропуске путем получения токена пропуска из POST запроса
// Path: api\get_pass.php

include '../system/init.php';

// Проверка на наличие токена пропуска в POST запросе
if(isset($_POST['token'])){
    // Получаем токен пропуска из POST запроса
    $token = $_POST['token'];
    // Проверка на наличие пропуска в базе данных
    $user = R::findOne('pass', 'token = ?', array($token));
    if($user){
        // Выводим информацию о пропуске в формате JSON
        // Скрываем значение passport в JSON
        $user->passport = 'hidden';
        echo json_encode($user, JSON_UNESCAPED_UNICODE);
    }else{
        // Выводим cобщением json об ошибке
        echo json_encode(array('error' => 'Пропуск не найден!'), JSON_UNESCAPED_UNICODE);
    }
} else {
    // Выводим cобщением json об ошибке "Не полный запрос"
    echo json_encode(array('error' => 'Не полный запрос!'), JSON_UNESCAPED_UNICODE);
}