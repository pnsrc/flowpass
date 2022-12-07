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
    <header>
    <nav class="header__nav header__nav_black">
        <a href="/" class="header__logo">flowpass//</a>
      </nav>
      <nav class="header__nav">
        <ul class="header__list">
          <li><a href="/pass/make" class="header__link">Создать пропуск</a></li>
          <li><a href="/" class="header__link">Список пропусков</a></li>
          <li><a href="/notify" class="header__link">Уведомления</a></li>
          <li><a href="/settings" class="header__link">Настройки</a></li>
          <li><a href="/exit" class="header__link">Выход</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section class="card-info">
        <div class="card-info__container container">
          <div class="card-info__row">
            <h1 class="card-info__title title"><?php echo $short; ?></h1>
            <div class="card-info__img img">
              <img src="../<?php echo $photo; ?>" alt="Фото">
            </div>
          </div>
          <div class="card-info__wrapper wrapper_bg">
            <div class="card-info__column card-info__column_left">
              <div class="card-info__info">
                <h3 class="card-info__title title">Информация о пользователе</h3>
                <p class="card-info__text">ФИО: <?php echo $fio; ?> </p>
                <p class="card-info__text">Дата рождения: <?php echo $birthday; ?></p>
                <p class="card-info__text">Телефон: +<?php echo $phone; ?></p>
                <p class="card-info__text">Почта: <?php echo $email; ?></p>
              </div>
              <div class="card-info__info">
                <h3 class="card-info__title title">Информация о пропуске</h3>
                <p class="card-info__text">Статус пропуска:
                <?php
                if ($status == "valid") {
                  echo '<b class="card-info__bold-text">Активирован</b>';
                } else {
                  echo '<b class="card-info__bold-text">Не активирован</b>';
                }
                ?>
                </p>
                <p class="card-info__text">Дата активации: <?php echo $issue_date;?></p>
                <p class="card-info__text">Дата окончания: <?php echo $end_date;?></p>
              </div>
            </div>
            <div class="card-info__column card-info__column_right">
              <div class="card-info__qr">
                 <span class="img">
                  <img src="https://chart.googleapis.com/chart?cht=qr&chl=<?php echo $pass->token; ?>&chs=180x180&choe=UTF-8&chld=L|2" alt="QR-код">
                 </span>
                 <a href="/pass/resend?id=<?php echo $id;?>">Нажмите, чтобы повторить <br> отправку электроного письма</a>
              </div>
              <nav class="card-info__buttons">
                <a href="/pass/edit?id=<?php echo $id;?>" class="card-info__button button">Редактировать пропуск</a>
                <a href="/pass/resend?id=<?php echo $id;?>" class="card-info__button button">Отправить на почту</a>
                <?php
                if ($status == "valid") {
                  echo '<a href="/pass/deactive?id='.$id.'" class="card-info__button button">Деактивировать пропуск</a>';
                } else {
                  echo '<a href="/pass/active?id='.$id.'" class="card-info__button button">Активировать пропуск</a>';
                }
                ?>
                <a href="/pass/delete?id=<?php echo $id;?>" class="card-info__button button">Удалить пропуск</a>
              </nav>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>

</html>