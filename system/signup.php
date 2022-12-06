<?php
// Регистрация пользователя в базе данных
// Выполнить код только если пользователь нажал кнопку "Зарегистрироваться"
if (isset($_POST['do_signup'])) {
    // Получить данные из POST-запроса
    $password = $_POST['password'];
    $confirm_password = $_POST['password_2'];
    $lastname = $_POST['lastname'];
    $firstname = $_POST['username'];
    $middlename = $_POST['middlename'];
    $email = $_POST['email'];
    $key = $_POST['key'];

    // ключ доступа к регистрации
    $access_key = "lol_its_not_a_key";

    // проверить ключ доступа, если он не совпадает, вывести ошибку
    if ($key != $access_key) {
        echo json_encode(['error' => 'Неверный ключ доступа'], JSON_UNESCAPED_UNICODE);
        exit();
    }


    // Проверить, существует ли пользователь с таким же логином
    $user = R::findOne('admins', 'email = ?', [$email]);
    if ($user) {
        // Если пользователь существует, вернуть ошибку
        echo json_encode(['error' => 'User with this email already exists'],JSON_UNESCAPED_UNICODE);
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
            $user->token = bin2hex(random_bytes(32));
            R::store($user);
            // Перенаправить пользователя на главную страницу
            echo "<script>window.location.href = '/';</script>";
        } else {
            // Если пароли не совпадают, вернуть ошибку
            echo json_encode(['error' => 'Passwords do not match'],JSON_UNESCAPED_UNICODE);
        }
    }
}


?>