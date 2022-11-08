<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
        <link href="http://fonts.cdnfonts.com/css/helvetica-neue-9" rel="stylesheet">

        <title>flowpass</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/all_pass.css">

    </head>
    <body>
<nav>
        <div class="first_podium center">
            <p style="color: white;font-size: 122%;" class="text-center logo"><a href="/" style="color: white;text-decoration: none;">flowpass//</a></p>
        </div>
        <div class="second_podium">
                <div class="links">
                    <a class="nav-a" href="/make">Создать пропуск</a>
                    <a class="nav-a" href="/notifications">Уведомления</a>
                    <a class="nav-a" href="/settings">Настройки</a>
                    <a class="nav-a" href="/logout">Выход</a>
                </div>
        </div>

    </nav>
        <h1 style="    margin-left: 4%;
        font-family: 'Helvetica Neue', sans-serif;
">
            <b>Список пропусков</b>
        </h1>
        <div style="padding: 4%;" class="container">
            <table>
                <tr>
                    <b>
                        <td>ID</td>
                        <td>ФИО</td>
                        <td>Статус</td>
                        <td>Дата Активации</td>
                        <td>Дата Окончания</td>
                        <td>Переход к пропуску</td>
                    </b>
                </tr>
                <?php
                // Вывод всех пропусков в таблицу с помощью цикла и если их нет, то выводится сообщение об этом и предложение создать пропуск
                $pass = R::findAll('pass');
                foreach ($pass as $pass) {
                    echo '<tr>';
                    echo '<td>' . $pass->id . '</td>';
                    echo '<td>' . $pass->fio . '</td>';
                    // Проверка статуса пропуска
                    if ($pass->status == "valid") {
                        echo '<td>Активирован</td>';
                    } else {
                        echo '<td>Не активирован</td>';
                    }
                    echo '<td>' . $pass->date_activation . '</td>';
                    echo '<td>' . $pass->date_expiration . '</td>';
                    echo '<td><a href="/pass?id=' . $pass->id . '">Перейти</a></td>';
                    echo '</tr>';
                }
                if (empty($pass)) {
                    echo '<tr>';
                    echo '<td colspan="6" style="text-align: center;">Пропусков нет, <a href="/make">создать пропуск</a></td>';
                    echo '</tr>';
                }

                ?>
            </table>
        </div>
    </body>

</html>