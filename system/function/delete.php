<?php
require "../init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    <?php
    // Получаем id из адресной строки
    $id = $_GET['id'];
    // Ищем в БД запись с таким id
    $pass = R::findOne('pass', 'id = ?', array($id));
    // Если запись не найдена, то выводим ошибку в alert js
    if (!$pass) {
        // С помощью js пишем ошибку в alert
        echo '<script>alert("Пропуск не найден");</script>';
        // С помощью js перенаправляем историю назад
        echo '<script>history.back();</script>';
    } else {
        // Удаляем запись
        R::trash($pass);
        echo '<script>alert("Пропуск успешно удален");</script>';
        // С помощью js перенаправляем историю назад
        echo '<script>window.location.href="/";</script>';
    }

  ?>
<?php else : ?>
Доступ запрещен
<?php endif; ?>