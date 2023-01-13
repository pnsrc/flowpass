<?php
// Авторизация пользователя
// Этот API вызывается из приложения для авторизации пользователя
//
// Вход: электронная почта и пароль пользователя из POST-запроса

// Подключить файл подключения к базе данных
include_once 'init.php';

// Проверить нажата ли кнопка "Войти"
if (isset($_POST['do_login'])) {
    // Получить электронную почту и пароль пользователя из POST-запроса
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Получить данные пользователя из базы данных с помощью redbean
    $user = R::findOne('admins', 'email = ?', [$email]);

    // Проверить, существует ли пользователь и проверить пароль
    if ($user) {
        // Если пользователь существует, проверьте, правильный ли пароль
        if (password_verify($password, $user->password)) {
            // Проверяем значение otp если оно true, то убираем содержание страницы и меняем его на pages/2fa_auth.php
            if ($user->otp == 'true') {
                // Если пароль правильный, создаем копию сессии и перенаправляем пользователя на страницу 2fa_auth.php
                $_SESSION['_logged_user'] = $user;
                // Редирект на главную
                echo "<script>window.location.href = '/auth/2fa';</script>";

            } else {
                // Если пароль правильный, создать сессию и перенаправить пользователя на главную страницу
                $_SESSION['logged_user'] = $user;
                // Редирект на главную
                echo "<script>window.location.href = '/';</script>";
            }
        } else {
            // Если пароль неправильный, вернуть ошибку
            echo json_encode(['error' => 'Password is incorrect'],JSON_UNESCAPED_UNICODE);
        }
    } else {
        // Если пользователь не существует, вернуть ошибку
        echo json_encode(['error' => 'User does not exist'],JSON_UNESCAPED_UNICODE);
    }
}