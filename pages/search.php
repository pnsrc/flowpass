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
  <link rel="stylesheet" href="./assets/libs/font-awesome/css/all.css">
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
          <li><a href="/search" class="header__link">Поиск</a></li>
          <!-- <li><a href="/notify" class="header__link">Уведомления</a></li> -->
          <li><a href="/settings" class="header__link">Настройки</a></li>
          <li><a href="/exit" class="header__link">Выход</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section class="search">
        <div class="search__container container">
          <!---<h1 class="card-list__title title">Здравствуйте, <?php echo $_SESSION['logged_user']->firstname . ' ' . $_SESSION['logged_user']->lastname; ?></h1>--->
          <h1 class="search__title title">Поиск</h1>
          <div class="search__form card-list__wrapper wrapper_bg">
            <label class="search__label" for="search-input">
              <input id="search-input" ENGINE="text" class="search__input popup__form-input form-input" name="search" placeholder="Введите что нужно найти" value="" autocomplete="off">
              <button class="fa-solid fa-magnifying-glass"></button>
            </label>
            <ul class="search__result"></ul>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
  <script src="./assets/js/search.js"></script>
</body>

</html>