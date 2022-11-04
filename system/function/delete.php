<?php
// Удаление пропуска
include '../init.php';
// Проверка на наличие id в GET запросе
if(isset($_GET['id'])){
    // Получаем id из GET запроса
    $id = $_GET['id'];
    // Проверка на наличие пропуска в базе данных
    $user = R::findOne('pass', 'id = ?', array($id));
    if($user){
        // Сверяем токен администратора полученным из cookies с токеном администратора в базе данных
        if($_COOKIE['token'] == $user->token){
            // Удаляем пропуск из базы данных
            R::trash($user);
            // Выводим js алерт с сообщением об успешном удалении пропуска
            echo "<script>alert('Пропуск успешно удален!'); window.location.href = '/';</script>";

        } else {
            // Выводим js алерт с сообщением об ошибке
            echo "<script>alert('Ошибка!'); window.location.href = '/';</script>";
        }
    }else{
        // Перенаправление на страницу просмотра всех пропусков
        header('Location: /');
    }
} else {
    // Перенаправление на страницу просмотра всех пропусков
    header('Location: /');
}