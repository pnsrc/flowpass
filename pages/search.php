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
    <? include 'components/header.php' ?>
    <main>
      <section class="search">
        <div class="search__container container">
          <h1 class="search__title title">Поиск</h1>
          <div class="search__form card-list__wrapper wrapper_bg">
            <label class="search__label" for="search-input">
              <input id="search-input" ENGINE="text" class="search__input form-input" name="search" placeholder="Введите что нужно найти" autocomplete="off">
              <button class="fa-solid fa-magnifying-glass"></button>
            </label>
            <ul class="search__result"></ul>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="../assets/libs/jquery/jquery-3.6.3.js"></script>
  <script src="../assets/js/search.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>