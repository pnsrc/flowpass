<?php

// проверяем, нажата кнопка submit-token
if (isset($_POST['submit-token'])) {
    // проверяем, существует ли переменная token
    if (isset($_POST['token'])) {
        // проверяем, не пустая ли переменная token
        if (!empty($_POST['token'])) {
            // проверяем, совпадает ли значение переменной token с токеном в сессии
            if ($_POST['token'] == $_SESSION['logged_user']->token) {
                // если совпадает, то выводим сообщение об успехе
                    // Изменяем значение toggle в БД на 0 redbeanphp
                    $user = R::load('admins', $_SESSION['logged_user']->id);
                    $user->toggle = 0;
                    R::store($user);
            } else {
            }
        } else {
        }
    } else {
    }
}

?>