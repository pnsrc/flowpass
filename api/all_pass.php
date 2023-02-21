<?php
// API для получения всех пропусков, с id, fio, token
// Path: api\all_pass.php

// Соединение с БД
include "../system/init.php";
// Получаем токен из пост запроса
$token = $_POST['token'];
// Ищем пользователя по токену
$user = R::findOne('admins', 'token = ?', array($token));
// Проверяем toggle = true
if($user->toggle == 1){
    // Получаем все пропуска
    $pass = R::findAll('pass');
    // Выводим массив id, fio, token
    foreach($pass as $p){
        $arr[] = array('id' => $p->id, 'fio' => $p->fio, 'token' => $p->token);
    }
    // Выводим массив в формате JSON
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);

}else{
    // Выводим cобщением json об ошибке
    echo json_encode(array('error' => 'Доступ запрещен! Проверьте настройки'), JSON_UNESCAPED_UNICODE);
}

?>