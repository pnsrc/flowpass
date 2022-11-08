<?php
// Подключаем файл инициализации
require_once 'system/init.php';

        //Получаем id из адресной строки
        $id = $_GET['id'];

        // Получаем информацию о пропуске
        $user = R::findOne('pass', 'id = ?', array($id));

// При нажатии кнопки do_edit изменяем данные в БД
if(isset($_POST['do_edit'])){{
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
        echo $_POST['id'];
        $pass = R::load('pass', $_POST['id']);
        $pass->username = $_POST['name'];
        $pass->lastname = $_POST['surname'];
        $pass->patronymic = $_POST['patronymic'];
        $pass->fio = $_POST['surname'] . ' ' . $_POST['name'] . ' ' . $_POST['patronymic'];
        $pass->bday = $_POST['bday'];
        $pass->email = $_POST['email'];
        $pass->phone = $_POST['number'];
        $pass->token = generateRandomString();
        R::store($pass);
        // Показываем сообщение об успешном изменении данных алерт с помощью JS и перезагружаем страницу
        echo "<script>alert('Данные успешно изменены!'); window.location.href = '/';</script>";
    }
}

// Подключаем шаблон страницы
require_once 'pages/edit.php';

?>