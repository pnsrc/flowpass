<?php
// Path: system\pass_info.php
// Получаем через GET id пропуска
$id = $_GET['id'];

// Получаем данные о пропуске
$pass = R::findOne('pass', 'id = ?', array($id));
// Выводим фамилию с инициалами
$short = $pass->second_name . ' ' . mb_substr($pass->first_name, 0, 1) . '.' . mb_substr($pass->large_name, 0, 1) . '.';
// Выводим фио
$fio = $pass->fio;
// Выводим дату рождения
$birthday = $pass->bday;
// Выводим дату выдачи
$issue_date = $pass->date_activation;
// Выводим дату окончания
$end_date = $pass->date_expiration;
// Выводим фото
$photo = $pass->picture;
// Выводим статус
$status = $pass->status;
// Выводим телефон
$phone = $pass->tel;
// Выводим паспорт
$passport = $pass->passport;
// Выводим почту
$email = $pass->email;
?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>flowpass//</title>
  <link rel="stylesheet" href="../assets/libs/font-awesome/css/all.css">
  <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
  <div class="wrapper">
    <? include 'components/header.php' ?>
    <main>
      <section class="card-info">
        <div class="card-info__container container">
          <h1 class="card-info__title title">Информация о пользователе</h1>
          <div class="card-info__wrapper wrapper_bg">
            <div class="card-info__column card-info__column_left">
              <div class="card-info__img img">
                <img src="../<?= $photo; ?>" alt="Фото">
              </div>
              <div class="card-info__qr">
                <span class="img">
                  <img src="https://chart.googleapis.com/chart?cht=qr&chl=<?= $pass->token; ?>&chs=180x180&choe=UTF-8&chld=L|2" alt="QR-код">
                </span>
                <a href="/pass/resend?id=<?= $id; ?>">Нажмите, чтобы повторить <br> отправку электроного письма</a>
              </div>
            </div>
            <div class="card-info__column card-info__column_right">
              <div class="card-info__info">
                <h3 class="card-info__title title">Информация о пользователе</h3>
                <p class="card-info__text">ФИО: <?= $fio; ?> </p>
                <p class="card-info__text">Дата рождения: <?= $birthday; ?></p>
                <p class="card-info__text">Телефон: <?= $phone; ?></p>
                <p class="card-info__text">Почта: <?= $email; ?></p>
              </div>
              <div class="card-info__info">
                <h3 class="card-info__title title">Информация о пропуске</h3>
                <p class="card-info__text">Статус пропуска:
                  <? if ($status == "valid") {
                    echo '<b class="card-info__bold-text">Активирован</b>';
                  } else {
                    echo '<b class="card-info__bold-text" style="color: #b71010;">Не активирован</b>';
                  } ?>
                </p>
                <p class="card-info__text">Дата активации: <?= $issue_date; ?></p>
                <p class="card-info__text">Дата окончания: <?= $end_date; ?></p>
              </div>
              <nav class="card-info__buttons">
                <a href="/pass/edit?id=<?= $id; ?>" class="card-info__button button">Редактировать пропуск</a>
                <a href="/pass/resend?id=<?= $id; ?>" class="card-info__button button">Отправить на почту</a>
                <? if ($status == "valid") {
                  echo '<a href="/pass/deactive?id=' . $id . '" class="card-info__button button">Деактивировать пропуск</a>';
                } else {
                  echo '<a href="/pass/active?id=' . $id . '" class="card-info__button button">Активировать пропуск</a>';
                } ?>
                <a href="/pass/delete?id=<?= $id; ?>" class="card-info__button button">Удалить пропуск</a>
              </nav>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="../assets/libs/jquery/jquery-3.6.3.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>