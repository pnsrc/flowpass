<?php
// Подключение к БД и к шаблону
include "system/init.php";
include "system/namespaces.php";

// Проверка, авторизован ли пользователь
if (isset($_SESSION['logged_user'])) {
} else {
    // Если пользователь не авторизован, перенаправить его на главную страницу
    header('Location: /');
}


// Код для добавление нового пользователя с формы
if (isset($_POST['add_user'])) {
    // Проверка, заполнены ли все поля
    if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['patronymic']) && isset($_POST['email'])) {
        // Проверка, nam ли пользователь с таким именем
        $user = R::findOne('users', 'email = ?', array($_POST['email']));
        if ($user) {
            // Если пользователь с таким именем существует, вывести сообщение об ошибке
            $errors[] = 'Пользователь с таким email уже существует!';
        } else {
            // Создаем функцию для генерации уникального токена для пользователя
            function generateRandomString($length = 10)
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }
            // Если пользователь с таким именем не существует, добавить нового пользователя
            $user = R::dispense('pass');
            $user->username = $_POST['name'];
            $user->lastname = $_POST['surname'];
            $user->patronymic = $_POST['patronymic'];
            $user->fio = $_POST['surname'] . ' ' . $_POST['name'] . ' ' . $_POST['patronymic'];
            $user->bday = $_POST['bday'];
            $user->status = "valid";
            $user->date_activation = date("Y-m-d H:i:s");
            $user->date_expiration = date("Y-m-d H:i:s", strtotime("+1 year"));
            $user->email = $_POST['email'];
            $user->phone = $_POST['number'];
            $user->token = generateRandomString();
            $user->passport = $_POST['passport'];
			$user->picture = $new_filename;
            R::store($user);
            // Перенаправить пользователя на главную страницу и вывести сообщение об успешном добавлении
            // Всплывающее сообщение на js об успешном добавлении
            echo "<script>alert('Пользователь успешно добавлен!');</script>";
            header('Location: /');

        }
    } else {
        // Если не все поля заполнены, вывести сообщение об ошибке
        $errors[] = 'Заполните все поля!';
    }
}
// вывод ошибок
if (!empty($errors)) {
    echo '<div style="color: red;">' . array_shift($errors) . '</div><hr>';
}

include "pages/make/main.php";

?>