<?php
include 'init.php';
// Код для добавление нового пользователя с формы
// Проверка, nam ли пользователь с таким именем
$user = R::findOne('pass', 'email = ?', array($_POST['email']));
if ($user) {
    // Если пользователь с таким именем существует, вывести сообщение об ошибке
    $message = "Пользователь с таким email уже существует!";
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
    if (isset($_FILES) && $_FILES['file']['error'] == 0) {
        $uploaddir = '../uploads/';
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
        $new_filename = $uploadfile;
    }

    // Если пользователь с таким именем не существует, добавить нового пользователя
    $user = R::dispense('pass');
    $user->first_name = $_POST['first_name'];
    $user->second_name = $_POST['second_name'];
    $user->large_name = $_POST['large_name'];
    $user->fio = $_POST['second_name'] . ' ' . $_POST['first_name'] . ' ' . $_POST['large_name'];
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
    //  HTML-шаблон для письма
    $email_body = file_get_contents("template_mail.html");
    $email_body = str_replace('%second_name%', $user->second_name, $email_body);
    $email_body = str_replace('%first_name%', $user->first_name, $email_body);
    $email_body = str_replace('%large_name%', $user->large_name, $email_body);
    $email_body = str_replace('%token%', $user->token, $email_body);
    $email_body = str_replace('%link%', $_SERVER['SERVER_NAME'], $email_body);

    mail($to, $subject, $email_body, $headers);
    // if (!mail($to, $subject, $email_body, $headers)) {
    //     $message = 'Ошибка отправки письма пользователю';
    // } else {
        $message = "Пользователь успешно добавлен!";
    //}
}
// Преобразуем сообщение в JSON-массив

$response = array("message" => $message);
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
json_last_error_msg();
