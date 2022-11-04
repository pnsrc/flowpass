<?php
// Модуль для отправки сообщений на электронную почту
//
// Автор - Алексей Аленич @pnsrc

// Включить файл подключения к базе данных
include_once 'init.php';

// Функция для отправки сообщений на электронную почту
function send_mail($to, $subject, $message) {
    // Подключить библиотеку PHPMailer
    require_once 'PHPMailer/PHPMailerAutoload.php';

    // Создать объект PHPMailer
    //$mail = new PHPMailer;

    // Настроить SMTP
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'alexeyalenich@gmail.com';          // SMTP username
    $mail->Password = '********';                         // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    // Настроить отправителя
    $mail->setFrom('FlowPass', 'FlowPass');

    // Настроить получателя
    $mail->addAddress($to);                               // Add a recipient

    // Настроить тему письма
    $mail->Subject = $subject;

    // Настроить тело письма
    $mail->Body    = $message;

    // Отправить письмо
    $mail->send();
}


?>