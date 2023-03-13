<?php
// Регистрация пользователя в базе данных
// Выполнить код только если пользователь нажал кнопку "Зарегистрироваться"
include 'init.php';
// Получить данные из POST-запроса
$password = $_POST['password'];
$confirm_password = $_POST['password_2'];
$lastname = $_POST['second_name'];
$firstname = $_POST['first_name'];
$middlename = $_POST['large_name'];
$email = $_POST['email'];
$key = $_POST['key'];
$secret_otp = $ga->createSecret();


// ключ доступа к регистрации
$access_key = "hehe";

// проверить ключ доступа, если он не совпадает, вывести ошибку
if ($key == $access_key) {
    // Проверить, существует ли пользователь с таким же логином
    $user = R::findOne('admins', 'email = ?', [$email]);
    if ($user) {
        // Если пользователь существует, вернуть ошибку
        $message = "Администратор с таким email уже существует!";
    } else {
        // Если пользователь не существует, проверить, совпадают ли пароли
        if ($password == $confirm_password) {
            // Если пароли совпадают, создать нового пользователя
            $user = R::dispense('admins');
            $user->password = password_hash($password, PASSWORD_DEFAULT);
            $user->lastname = $lastname;
            $user->firstname = $firstname;
            $user->middlename = $middlename;
            $user->email = $email;
            $user->toggle = true;
            $user->token = bin2hex(random_bytes(32));
            $user->otp_token = $secret_otp;
            $user->otp = "false";
            R::store($user);
            // Перенаправить пользователя на главную страницу
            $message = 'Регистрация прошла успешно!';
        } else {
            // Если пароли не совпадают, вернуть ошибку
            $message = "Пароли не совпадают!";
        }
    }
} else {
    $message = 'Неверный ключ доступа';
}

$response = array("message" => $message);
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
