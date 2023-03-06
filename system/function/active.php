<?
require "../init.php";
if (isset($_SESSION['logged_user'])) :
    // Получаем id из адресной строки
    $id = $_GET['id'];
    // Ищем в БД запись с таким id
    $pass = R::findOne('pass', 'id = ?', array($id));
    // Если запись не найдена, то выводим ошибку
    if (!$pass) {
        echo '<script>alert("Запись не найдена");</script>';
        // С помощью js перенаправляем историю назад
        echo '<script>history.back();</script>';
    }
    // Проверяем статус записи
    if ($pass->status == "valid") {
        // Если статус 0, то меняем на 1
        $pass->status = "invalid";
        // Сохраняем изменения
        R::store($pass);
        // С помощью js перенаправляем историю назад
        echo '<script>history.back();</script>';
    } else {
        // Если статус 1, то меняем на 0
        $pass->status = "valid";
        // Сохраняем изменения
        R::store($pass);
        // С помощью js перенаправляем историю назад
        echo '<script>history.back();</script>';
    }
else : ?>
    Доступ запрещен
<? endif; ?>