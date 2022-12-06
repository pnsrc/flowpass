<?php
// Уведомления о истекших пропусках и о пропусках, которые истекут через 3 дня
// Подключаемся к базе данных
include 'init.php';

// Получаем текущую дату и время
$now = date('Y-m-d H:i:s');

// Получаем список пропусков, которые истекают через 3 дня
$pass = R::find('pass', 'date_expiration <= DATE_ADD(?, INTERVAL 3 DAY) AND date_expiration >= ?', array($now, $now));
// Получаем список пропусков, которые истекли
$pass2 = R::find('pass', 'date_expiration <= ?', array($now));

?>