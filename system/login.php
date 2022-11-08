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
            // Генерируем токен
            $token = bin2hex(random_bytes(32));;

            // Если пароль правильный, создать сессию для пользователя
            $_SESSION['logged_user'] = $user;
            // Обновить время последнего входа пользователя, а также его one time token
            $user->last_login = date('Y-m-d H:i:s');
            $user->one_time_token = $token;
            R::store($user);
            // Добавляем в куки токен
            setcookie('token', $token, time() + 60 * 60 * 24 * 30, '/');
            // Перенаправить пользователя на главную страницу
            header('Location: /');
        } else {
            // Если пароль неправильный, вернуть ошибку
            echo json_encode(['error' => 'Password is incorrect'],JSON_UNESCAPED_UNICODE);
        }
    } else {
        // Если пользователь не существует, вернуть ошибку
        echo json_encode(['error' => 'User does not exist'],JSON_UNESCAPED_UNICODE);
    }
}