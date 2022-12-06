<?php
// получаем пропуска
$passes = R::findAll('pass');

?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>flowpass//</title>
  <link rel="stylesheet" href="./assets/fonts/font-awesome/css/all.css">
  <link rel="stylesheet" href="./assets/css/style.css">
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
      <section class="card-list">
        <div class="card-list__container container">
          <!---<h1 class="card-list__title title">Здравствуйте, <?php echo $_SESSION['logged_user']->firstname . ' ' .$_SESSION['logged_user']->lastname; ?></h1>--->
          <h1 class="card-list__title title">Список пропусков</h1>
          <div class="card-list__wrapper wrapper_bg">
            <table class="card-list__table">
              <thead>
                <tr>
                  <th class="card-list__id">ID</th>
                  <th class="card-list__fio">ФИО</th>
                  <th>Статус</th>
                  <th>Дата активации</th>
                  <th>Дата окончания</th>
                  <th>Переход к пропуску</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($passes as $pass) : ?>
                  <tr>
                    <td><?= $pass['id'] ?></td>
                    <td><?= $pass['fio'] ?></td>
                    <td><?= $pass['status'] == 'valid' ? 'Действующий' : 'Просрочен' ?></td>
                    <td><?= $pass['date_activation'] ?></td>
                    <td><?= $pass['date_expiration'] ?></td>
                    <td><a href="/pass/view?id=<?= $pass['id'] ?>" class="card-list__link">Перейти</a></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>

            </table>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>

</html>