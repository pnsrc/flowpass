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
          <h1 class="card-list__title title">Настройки</h1>
          <div class="card-list__wrapper wrapper_bg">
            <p>Запретить регистрацию для других пользователей</p>
            <form action="/settings" method="POST">
              <button type="submit" name="reg" class="btn btn_green">Запретить</button>
            </form>
            <p style="color:tomato;"> Внимание, чтобы восстановить данный функционал придется все заново создать файл reg.php в корневой директории!</p>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>

</html>