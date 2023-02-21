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


    $email_body = "<p>Здравствуйте, " . $_POST['second_name'] . ' ' .
        $_POST['first_name'] . ' ' . $_POST['large_name'] .
        "!</p> <br>Спасибо за регистрацию! <br>Вот ваш токен: " . $user->token .
        "<br> Пожалуйста, пройдите по адресу <a href='https://" . $_SERVER['SERVER_NAME'] .
        "/pwa'>ссылке</a><br>С уважением, Администрация";


    mail($to, $subject, $email_body, $headers);

    //if (!mail($to, $subject, $email_body, $headers)) {
    //    $message = 'Ошибка отправки письма пользователю';
    //} else {
        $message = "Пользователь успешно добавлен!";
    //}
}

$response = array("message" => $message);
header('Content-type: application/json');
echo json_encode($response);
json_last_error_msg();
