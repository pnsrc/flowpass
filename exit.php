<?php
// Выход из системы
// Подключение к БД
include "system/init.php";

// Проверка, авторизован ли пользователь
if (isset($_SESSION['logged_user'])) {
    // Если пользователь авторизован, удалить его сессию
    unset($_SESSION['logged_user']);
    // Перенаправить пользователя на главную страницу
    header('Location: /');
} else {
    // Если пользователь не авторизован, перенаправить его на главную страницу
    header('Location: /');
}