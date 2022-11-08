<?
// Подключаем файл инициализации
include_once '../../system/init.php';
$id = $_GET['id'];
$user = R::findOne('pass', 'id = ?', array($id));
// Проверка на наличие пропуска в базе данных и если он отсутствует, то перенаправляем на страницу просмотра всех пропусков
if(!$user){
    header('Location: /');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,600;1,600&display=swap" rel="stylesheet">
        <title>flowpass</title>
        <link rel="stylesheet" href="../../css/style.css">
        <link rel="stylesheet" href="../../css/all_pass.css">
        <link href="http://fonts.cdnfonts.com/css/helvetica-neue-9" rel="stylesheet">


    </head>
    <body>
<nav>
        <div class="first_podium center">
            <p style="color: white;font-size: 122%;" class="text-center logo"><a href="/" style="color: white;text-decoration: none;">flowpass//</a></p>
        </div>
        <div class="second_podium">
                <div class="links">
                    <a class="nav-a" href="/make">Создать пропуск</a>
                    <a class="nav-a" href="/all">Все пропуска</a>
                    <a class="nav-a" href="/notifications">Уведомления</a>
                    <a class="nav-a" href="/settings">Настройки</a>
                    <a class="nav-a" href="/portal/bye">Выход</a>
                </div>
        </div>

        </nav>
        <div style="margin-left: 4%; margin-right: 4%;" class="preheader">
            <h1 style="font-family: 'Helvetica Neue', sans-serif;">
                <b><?php echo $user->fio; ?></b>
            </h1>
            <img style="height: 150px;     border-radius: 100%;
            " src="avatar-1665776795.jpg">
        </div>
        <div class="container2">
            <div class="parent">
                <h2>
                    <b>
                        Информация о пользователе
                    </b>
                </h2>
                <div class="user_info">
                <?php
                //Показ информации о пользователе id получаем из GET запроса
                echo '<p>ФИО: '.$user->fio.'</p>';
                echo '<p>Дата активации пропуска: '.$user->date_activation.'</p>';
                echo '<p>Дата деактивации пропуска: '.$user->date_expiration.'</p>';
                echo '<p>Дата рождения: '.$user->bday.'</p>';
                //Проверка на наличие фото и показывает его
                if($user->photo == ''){
                    echo '<p>Фото: Не загружено</p>';
                }else{
                    echo '<p>Фото: <img style="height: 150px;     border-radius: 100%;" src="'.$user->photo.'"></p>';
                }
                //Проверяем статус пропуска
                if(!$user->status == "valid"){
                    echo '<p>Статус пропуска: <span style="color: red;">Не активирован</span></p>';
                }else{
                    echo '<p>Статус пропуска: <span style="color: green;">Активирован</span></p>';
                }
                echo '<p>Почта: '.$user->email.'</p>';
                echo '<p>Телефон: '.$user->phone.'</p>';

                ?>
                </div>
                <div class="actions">
                    <?php
                    // Кнопки для действий с пропуском
                    if($user->status == "valid"){
                        echo '<a class="buttons_actions" href="/pass/deactivate?id='.$user->id.'">Анулировать</a>                        ';
                    }else
                    {
                        echo '<a class="buttons_actions" href="/pass/activate?id='.$user->id.'">Активировать</a>                        ';
                    }
                    // Редактирование пропуска
                    echo '<a class="buttons_actions" href="/pass/edit?id='.$user->id.'">Редактировать</a>';
                    // Удаление пропуска
                    echo '<a class="buttons_actions" href="/pass/delete?id='.$user->id.'">Удалить</a>';


                    ?>

                </div>
            </div>
            <div class="another_parent">
                <img src='https://chart.googleapis.com/chart?cht=qr&chl=flowpass uniq token: <?php echo $user->token; ?>&chs=180x180&choe=UTF-8&chld=L|2' alt=''></a>
                <a>Нажмите, чтобы повторить отправку электронного письма</a>

            </div>
            </div>
    </body>
    <style>

a.buttons_actions {
    margin: 12p;
    padding: 2%;
    text-decoration: none;
    background-color: #a14661;
    color: white;
    border-radius: 12px;
}
    .container2 {
    background: white;
    display: flex;
    height: 511px;
    margin: 2%;
    border-radius: 30px;
    /* flex-direction: column; */
    /* align-items: stretch; */
    /* align-content: space-between; */
    justify-content: space-between;
}
.parent, .another_parent {
    padding: 2%;
}

    </style>

</html>