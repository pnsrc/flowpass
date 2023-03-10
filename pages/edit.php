<?php
// Получаем id из адресной строки
$id = $_GET['id'];

// Ищем в БД запись с таким id
$pass = R::findOne('pass', 'id = ?', array($id));
// Получаем имя
$name = $pass->first_name;
// Получаем фамилию
$second_name = $pass->second_name;
// Получаем отчество
$large_name = $pass->large_name;
// Выводим дату рождения
$birthday = $pass->bday;
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
      <section class="card-red">
        <div class="card-red__container container">
          <h1 class="card-red__title title">Редактирование пропуска</h1>
          <div class="card-red__wrapper wrapper_bg">
            <h2 class="card-red__title form-title title">Введите данные пользователя</h2>
            <form id="form" class="card-red__form form" action="#" method="post">
              <input type="hidden" name="id" id="id" value="<?= $pass->id; ?>" placeholder="Имя">
              <div class="card-red__form-inputs form-inputs">
                <label class="card-red__form-label form-label" for="form-input">
                  <input value="<?= $second_name; ?>" type="text" placeholder="Фамилия" name="second_name" id="form-input" class="card-red__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-red__form-label form-label" for="form-input">
                  <input value="<?= $name; ?>" type="text" placeholder="Имя" name="first_name" id="form-input" class="card-red__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-red__form-label form-label" for="form-input">
                  <input value="<?= $large_name; ?>" type="text" placeholder="Отчество" name="large_name" id="form-input" class="card-red__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-red__form-label form-label" for="form-input">
                  <input value="<?= $birthday; ?>" type="date" data-placeholder="Дата рождения" name="date" id="form-input" class="card-red__form-input form-input fa-regular fa-calendar-days _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-red__form-label form-label" for="form-input">
                  <input value="<?= $phone; ?>" type="tel" placeholder="Номер телефона" name="tel" id="form-input" class="card-red__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-red__form-label form-label" for="form-input">
                  <input value="<?= $email; ?>" type="email" placeholder="Email" name="email" id="form-input" class="card-red__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-red__form-label form-label" for="form-input">
                  <input value="<?= $passport; ?>" type="text" placeholder="Серия и номер паспорта" name="passport" id="form-input" class="card-red__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
              </div>
              <div class="card-red__form-block form-block">
                <div class="card-red__form-list form-list">
                  <h4 class="card-red__form-text form-text">Фото для пропуска</h4>
                  <p class="card-red__form-text form-text">Какое фото нужно добавить:</p>
                  <ul class="card-red__form-text form-text">
                    <li>размер 3 * 4 см</li>
                    <li>белый фон</li>
                    <li>видна голова и верхняя часть плеч</li>
                  </ul>
                </div>
                <div class="card-red__form-pic form-pic">
                  <div class="card-red__form-imgs">
                    <div>
                      <div class="card-red__form-img form-img img">
                        <img src="../<?= $photo ?>" id="old_image" alt="фото">
                      </div>
                      <p id="old_file">Старое фото</p>
                    </div>
                    <i class="fa-solid fa-arrow-right"></i>
                    <div>
                      <div class="card-red__form-img form-img img">
                        <img src="../assets/img/no-img_bg-user.svg" id="chosen_image" alt="фото">
                      </div>
                      <p id="file_name">Фото не загружено</p>
                    </div>
                  </div>
                  <div class="card-red__form-file form-file">
                    <label class="card-red__form-button form-button" for="form-input_file">
                      <input type="file" accept=".jpeg, .png, .jpg" id="form-input_file" name="file" class="card-red__form-input form-input _required">
                      <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                      <p>Выбрать фото</p>
                      <i class="fa-regular fa-folder-open"></i>
                    </label>
                  </div>
                </div>
              </div>
              <input type="submit" value="Редактировать" name="red-card" class="card-red__form-button form-button button">
            </form>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="../assets/libs/jquery/jquery-3.6.3.js"></script>
  <script src="../assets/js/form-validation.js"></script>
  <script src="../assets/js/phone-mask.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>