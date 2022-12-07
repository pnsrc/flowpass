<?php
//получаем токен из сессии
$token = $_SESSION['logged_user']->token;
// получаем toggle из сессии
$toggle = $_SESSION['logged_user']->toggle;
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
    <main>
      <section class="settings">
        <div class="settings__container container">
          <h1 class="settings__title title">Настройки</h1>
          <div class="settings__wrapper wrapper_bg">

            <?php
              if ($toggle === 1) {
                echo '<div class="settings__row">
                <p class="settings__text">Разрешить доступ к управлению пропусками</p>
                <button data-num="1" class="settings__button button">Разрешить</button>
              </div>';
              } else {
                echo '          <div class="settings__row">
                <p class="settings__text">Запретить доступ к управлению пропусками</p>
                <button data-num="1" class="settings__button button">Запретить</button>
              </div>';}
            ?>
          </div>
        </div>
      </section>
      <!----------------------------------- POPUP -->

      <div class="popup">
        <div data-target="1" class="popup__wrapper">
          <div class="popup__body">
            <h2 class="popup__title title">Вы уверены?</h2>
            <p class="popup__text">Делая это, вы даёте согласие, что понимаете риск утечки вашего токена, а также угрозу утечки данных пользователей</p>
            <form class="popup__form form" action="/settings" method="post">
              <label for="form-input">
                <p>Введите ваш токен</p>
                <input placeholder="Токен" type="text" name="token" id="form-input" class="popup__form-input form-input">
              </label>
              <input type="submit" value="Подтвердить" name="submit-token" class="popup__form-button form-button button">
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <script src="../assets/js/popup.js"></script>
</body>

</html>