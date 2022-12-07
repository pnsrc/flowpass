<?php

// Код для добавление нового пользователя с формы
if (isset($_POST['add-card'])) {
    // Проверка, заполнены ли все поля
    if (isset($_POST['first_name']) && isset($_POST['second_name']) && isset($_POST['large_name']) && isset($_POST['email'])) {
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
            if(isset($_FILES) && $_FILES['file']['error'] == 0) {
                $uploaddir = 'uploads/';
                $uploadfile = $uploaddir . basename($_FILES['file']['name']);
                move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                $new_filename = $uploadfile;
            }



            // Если пользователь с таким именем не существует, добавить нового пользователя
            $user = R::dispense('pass');
            $user->first_name = $_POST['first_name'];
            $user->second_name = $_POST['second_name'];
            $user->large_name = $_POST['large_name'];
            $user->fio = $_POST['second_name'] .' '. $_POST['first_name'] .' '. $_POST['large_name'];
            $user->bday = $_POST['date'];
            $user->status = "valid";
            $user->date_activation = date("Y-m-d H:i:s");
            $user->date_expiration = date("Y-m-d H:i:s", strtotime("+1 year"));
            $user->email = $_POST['email'];
            $user->tel = $_POST['tel'];
            $user->token = generateRandomString();
            $user->passport = $_POST['passport'];
			$user->picture = $new_filename;
            R::store($user);
            // Отправляем пользователю email
            $to = $_POST['email'];

            $subject = 'Регистрация';

            $headers  = "From: hello@flowpass.ru \r\n";
            $headers .= "Reply-To:  hello@flowpass.ru \r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


            $message = "<p>Здравствуйте, " . $_POST['second_name'] .' '. $_POST['first_name'] .' '. $_POST['large_name'] . "!</p> <br>Спасибо за регистрацию! <br>Вот ваш токен: " . $user->token. "<br> Пожалуйста, пройдите по адресу <a href='https://".$_SERVER['SERVER_NAME']."/pwa'>ссылке</a><br>С уважением, Администрация";


            mail($to, $subject, $message, $headers);

            // Перенаправить пользователя на главную страницу и вывести сообщение об успешном добавлении
            // Всплывающее сообщение на js об успешном добавлении
            echo "<script>alert('Пользователь успешно добавлен!');</script>";
            echo "<script>window.location.href = '/';</script>";

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
?>