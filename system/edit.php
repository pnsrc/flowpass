<?php
include 'init.php';
$id = $_GET['id'];

// Получаем информацию о пропуске
$user = R::findOne('pass', 'id = ?', array($_POST['id']));
$DB_info = $user->export();
unset(
    $DB_info['token'],
    $DB_info['fio'],
    $DB_info["status"],
    $DB_info["date_activation"],
    $DB_info["date_expiration"],
    $DB_info["picture"]
);
if (!array_diff($DB_info, $_POST) && empty($_FILES['file']['tmp_name'])) {
    $message = "Данные не были изменены. Измените какое-либо поле!";
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
    $user = R::load('pass', $_POST['id']);
    $uploaddir = '../uploads/';
    if (isset($_FILES) && $_FILES['file']['error'] == 0) {
        $uploadfile = $uploaddir . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
        $filename = $uploadfile;
    } else {
        $photo = $user->picture;
        $filename = $photo;
    }
    // Обновляем данные в БД
    $user->first_name = $_POST['first_name'];
    $user->second_name = $_POST['second_name'];
    $user->large_name = $_POST['large_name'];
    $user->fio = $_POST['second_name'] . ' ' . $_POST['first_name'] . ' ' . $_POST['large_name'];
    $user->bday = $_POST['date'];
    $user->email = $_POST['email'];
    $user->tel = $_POST['tel'];
    $user->token = generateRandomString();
    $user->passport = $_POST['passport'];
    $user->picture = $filename;
    R::store($user);
    $to = $_POST['email'];

    $subject = 'Данные были обновлены';

    $headers  = "From: hello@flowpass.ru \r\n";
    $headers .= "Reply-To:  hello@flowpass.ru \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


    $message = "<p>Здравствуйте, " . $_POST['second_name'] . ' ' . $_POST['first_name'] . ' ' . $_POST['large_name'] .
        "!</p> <br>Ваши данные были обновлены, просим обновить ваш токен! <br>Вот ваш токен: " . $user->token .
        "<br> Пожалуйста, пройдите по <a href='https://" . $_SERVER['SERVER_NAME'] . "/pwa'>ссылке</a><br>С уважением, Администрация";


    mail($to, $subject, $message, $headers);

    $message = "Данные успешно изменены!";
}
// Преобразуем сообщение в JSON-массив

$response = array("message" => $message);
header('Content-type: application/json');
echo json_encode($response, JSON_UNESCAPED_UNICODE);
json_last_error_msg();
