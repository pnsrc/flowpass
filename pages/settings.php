<?php
//получаем токен из сессии
$token = $_SESSION['logged_user']->token;
$getotp = $_SESSION['logged_user']->otp;
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
      <section class="settings">
        <div class="settings__container container">
          <h1 class="settings__title title">Настройки</h1>
          <div class="settings__wrapper wrapper_bg">
            <? if ($toggle === 1) {
              echo '<div class="settings__row">
                <p class="settings__text">Разрешить доступ к управлению пропусками</p>
                <button data-num="1" class="settings__button button">Разрешить</button>
              </div>';
            } else {
              echo '          <div class="settings__row">
                <p class="settings__text">Запретить доступ к управлению пропусками</p>
                <button data-num="1" class="settings__button button">Запретить</button>
              </div>';
            }
            if ($getotp === "false") {
              echo '<div class="settings__row">
                <p class="settings__text">Авторизация с помощью одноразового кода</p>
                <button data-num="2" class="settings__button button">Разрешить</button>
              </div>';
            } else {
              echo '<div class="settings__row">
                <p class="settings__text">Авторизация с помощью одноразового кода</p>
                <button data-num="3" class="settings__button button">Отключить</button>
              </div>';
            } ?>
            <div class="settings__row">
              <p class="settings__text">Импортировать пользователей из 1С</p>
              <button data-num="4" class="settings__button button">Импортировать</button>
            </div>
          </div>
        </div>
      </section>
      <!----------------------------------- POPUP -->

      <div class="popup">
        <div data-target="1" class="popup__wrapper">
        <button class="popup__close fa-solid fa-xmark"></button>  
        <div class="popup__body">
            <h2 class="popup__title title">Вы уверены?</h2>
            <p class="popup__text">Делая это, вы даёте согласие, что понимаете риск утечки вашего токена, а также угрозу утечки данных пользователей</p>
            <form class="popup__form form" action="/settings" method="post">
              <label class="popup__form-label" for="form-input">
                <p>Введите ваш токен</p>
                <input placeholder="Токен" type="text" name="token" id="form-input" class="popup__form-input form-input">
              </label>
              <input type="submit" value="Подтвердить" name="submit-token" class="popup__form-button form-button button">
            </form>
          </div>
        </div>
        <div data-target="2" class="popup__wrapper">
        <button class="popup__close fa-solid fa-xmark"></button>  
        <div class="popup__body">
            <h2 class="popup__title title">Активация двухэтапной авторизации</h2>
            <p class="popup__text">После активации данной функции, вы будете обязаны вводить OTP-код, который генерирует приложение Google Authenticator. Сессия автоматически закончиться, после нажатия кнопки.</p>
            <form class="popup__form form" action="/settings" method="post">
              <div class="popup__img img">
                <img src="<?= $qrCodeUrl; ?>" alt="QR code" />
              </div>
              <input type="submit" value="Подтвердить" name="submit-2fa" class="popup__form-button form-button button">
            </form>
          </div>
        </div>
        <div data-target="3" class="popup__wrapper">
        <button class="popup__close fa-solid fa-xmark"></button>  
        <div class="popup__body">
            <h2 class="popup__title title">Отключение двухэтапной авторизации</h2>
            <p class="popup__text">После отключения данной функции, вы будете выполнять авторизацию без использования OTP-кодов. Сессия автоматически закончиться, после нажатия кнопки.</p>
            <form class="popup__form form" action="/settings" method="post">
              <input type="submit" value="Подтвердить" name="dissubmit-2fa" class="popup__form-button form-button button">
            </form>
          </div>
        </div>
        <div data-target="4" class="popup__wrapper">
        <button class="popup__close fa-solid fa-xmark"></button>  
        <div class="popup__body">
            <h2 class="popup__title title">Импортировать данные пользователей</h2>
            <p class="popup__text">Для импорта пользователей, настройте форму, согласно <a style="display: inline;" href='https://wiki.flowpass.ru/'>инструкции</a>.</p>
            <!--загрузки документа на ajax-->
            <form id="upload" class="popup__form form" action="/settings" method="post" enctype="multipart/form-data">
              <label class="popup__form-button form-button" for="file">
                <input type="file" id='file' name="file" class="popup__form-input form-input">
                <p>Выбрать файл</p>
                <i class="fa-regular fa-folder-open"></i>
              </label>
              <input type="submit" value="Подтвердить" name="submit-export" class="popup__form-button form-button button">
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script src="../assets/libs/jquery/jquery-3.6.3.js"></script>
  <script src="../assets/js/popup.js"></script>
  <script src="../assets/js/upload.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>