<?php
require "../init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    <?php
    // Получаем id из адресной строки
    $id = $_GET['id'];
    // Ищем в БД запись с таким id
    $pass = R::findOne('pass', 'id = ?', array($id));
    // Если запись не найдена, то выводим ошибку
    if (!$pass) {
        echo '<script>alert("Пропуск не найден");</script>';
        // С помощью js перенаправляем историю назад
        echo '<script>history.back();</script>';
    } else {
        $to = $pass->email;

        $subject = 'Повторное письмо с токеном';

        $headers  = "From: hello@flowpass.ru \r\n";
        $headers .= "Reply-To:  hello@flowpass.ru \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";


        $message = "<p>Здравствуйте, " . $pass->fio . "!</p> <br> Вам было отправлено повторное письмо ! <br>Вот ваш токен: " . $pass->token. "<br> Пожалуйста, пройдите по адресу <a href='https://".$_SERVER['SERVER_NAME']."/pwa'>ссылке</a><br>С уважением, Администрация";


        mail($to, $subject, $message, $headers);
        echo '<script>alert("Письмо было повторно отправлено");</script>';
        // С помощью js перенаправляем историю назад
        echo '<script>history.back();</script>';
    }
  ?>
<?php else : ?>
Доступ запрещен
<?php endif; ?>