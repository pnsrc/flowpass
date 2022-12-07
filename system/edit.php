<?php
        $id = $_GET['id'];

        // Получаем информацию о пропуске
        $user = R::findOne('pass', 'id = ?', array($id));

if(isset($_POST['red-card'])){{
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
    // Обновляем данные в БД
    $user = R::load('pass', $_POST['id']);
    $user->first_name = $_POST['first_name'];
    $user->second_name = $_POST['second_name'];
    $user->large_name = $_POST['large_name'];
    $user->fio = $_POST['second_name'] .' '. $_POST['first_name'] .' '. $_POST['large_name'];
    $user->bday = $_POST['date'];
    $user->email = $_POST['email'];
    $user->tel = $_POST['tel'];
    $user->token = generateRandomString();
    $user->passport = $_POST['passport'];
    R::store($user);
    $to = $_POST['email'];

$subject = 'Данные были обновлены';

$headers  = "From: hello@flowpass.ru \r\n";
$headers .= "Reply-To:  hello@flowpass.ru \r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";


$message = "<p>Здравствуйте, " . $_POST['second_name'] .' '. $_POST['first_name'] .' '. $_POST['large_name'] . "!</p> <br>Ваши данные были обновлены, просим обновить ваш токен ! <br>Вот ваш токен: " . $user->token. "<br> Пожалуйста, пройдите по адресу <a href='https://".$_SERVER['SERVER_NAME']."/pwa'>ссылке</a><br>С уважением, Администрация";


mail($to, $subject, $message, $headers);

// Показываем сообщение об успешном изменении данных алерт с помощью JS и перезагружаем страницу
echo "<script>alert('Данные успешно изменены!'); window.location.href = '/';</script>";
}
}

?>