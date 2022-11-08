<?php
// Активация пропуска
include '../init.php';
// Проверка на наличие id в GET запросе
if(isset($_GET['id'])){
    // Получаем id из GET запроса
    $id = $_GET['id'];
    // Проверка на наличие пропуска в базе данных
    $user = R::findOne('pass', 'id = ?', array($id));
    if($user){
        // Сверяем токен администратора полученным из cookies с токеном администратора в базе данных
        if($_COOKIE['token'] == $_SESSION['logged_user']->one_time_token){
            // Проверяем статус пропуска
            if($user->status == 'valid'){
                // Подгружаем пользователя из бд
                $user = R::load('pass', $id);
                $user->status = 'unvalid';
                R::store($user);
                // Выводим js алерт с сообщением об успешной активации пропуска
                echo "<script>alert('Пропуск успешно деактивирован!'); window.location.href = '/';</script>";
            } else {
                // Выводим js алерт с сообщением об ошибке
                echo "<script>alert('Ошибка! Пропуск уже деактивирован!'); window.location.href = '/';</script>";
            }


        } else {
            // Выводим js алерт с сообщением об ошибке
            echo "<script>alert('Ошибка! Попытка подделки токена'); window.location.href = '/';</script>";
        }
    }else{
        // Перенаправление на страницу просмотра всех пропусков
        header('Location: /');
    }
} else {
    // Перенаправление на страницу просмотра всех пропусков
    header('Location: /');
}

?>