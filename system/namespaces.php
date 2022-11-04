<?php
// Переменные для упрощенного доступа к данным администратора

// Имя администратора
$admin_name = $_SESSION['logged_user']->username;

// Фамилия администратора
$admin_surname = $_SESSION['logged_user']->lastname;

// Электронная почта администратора
$admin_email = $_SESSION['logged_user']->email;

// Имя и Отчество администратора
$admin_full_name = $admin_name . " " . $admin_surname;

// Фамилия с инициалами администратора
$admin_surname_i = $admin_surname . " " . mb_substr($admin_name, 0, 1) . ".";

// Отчество администратора
$admin_middlename = $_SESSION['logged_user']->middlename;

// Полное имя администратора
$admin_full_name = $admin_surname . " " . $admin_name . " " . $admin_middlename;

// Переменные для упрощенного доступа к данным пользователя

// Имя пользователя
