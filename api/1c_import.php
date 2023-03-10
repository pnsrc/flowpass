<?php
include '../system/init.php';
include '../system/components/mxl.php';
use Shuchkin\SimpleXLSX;

// Проверка на существование файла
if (isset($_FILES['file'])) {
    // Проверка на ошибки
    if ($_FILES['file']['error'] == 0) {
        // Проверка на размер файла
        if ($_FILES['file']['size'] <= 1000000) {
            // Проверка на тип файла
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            if (finfo_file($finfo, $_FILES['file']['tmp_name']) == 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
                // Перемещение файла
                // Открываем файл для вывода содержимого
                $xlsx = SimpleXLSX::parse($_FILES['file']['tmp_name']);

                // Выводим первый элемент массива
                // Используем цикл для вывода всех элементов массива начиная с 1
                foreach ($xlsx->rows() as $key => $value) {
                    if ($key > 0) {
                        $user = R::dispense('pass');
                        $user->first_name = $value[0];
                        $user->second_name = $value[1];
                        $user->large_name = $value[2];
                        $user->fio = $value[3];
                        $user->bday = $_POST['date'];
                        $user->status = "valid";
                        $user->date_activation = date("Y-m-d H:i:s");
                        $user->date_expiration = date("Y-m-d H:i:s", strtotime("+1 year"));
                        $user->email = $value[5];
                        $user->tel = $value[4];
                        $user->token = generateRandomString();
                        $user->passport = '';
                        R::store($user);

                        $to = $_POST['email'];

                        $subject = 'Регистрация';
                    
                        $headers  = "From: hello@flowpass.ru \r\n";
                        $headers .= "Reply-To:  hello@flowpass.ru \r\n";
                        $headers .= "MIME-Version: 1.0\r\n";
                        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                    

                        $email_body = "<p>Здравствуйте, " . $value[3] .
                            "!</p> <br>Ваши данные были внесены в систему пропусков flowpass//! <br>Вот ваш токен: " . $user->token .
                            "<br> Пожалуйста, пройдите по <a href='https://" . $_SERVER['SERVER_NAME'] .
                            "/pwa'>ссылке</a><br>С уважением, Администрация!";
                    
                    
                        mail($to, $subject, $email_body, $headers);

                    }
                }       echo 'Файл успешно загружен';
            }
            else {
                echo 'Неверный тип файла';
            }
        }
        else {
            echo 'Файл слишком большой';
        }
    }
    else {
        echo 'Ошибка при загрузке файла';
    }
}


?>