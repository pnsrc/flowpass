<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>flowpass//</title>
  <link rel="stylesheet" href="../../assets/libs/font-awesome/css/all.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
  <div class="wrapper">
    <? include 'components/header.php' ?>
    <main>
      <section class="card-new">
        <div class="card-new__container container">
          <h1 class="card-new__title title">Создать пропуск</h1>
          <div class="card-new__wrapper wrapper_bg">
            <h2 class="card-new__title form-title title">Введите данные пользователя</h2>
            <form id="form" class="card-new__form form" action="#" method="post">
              <div class="card-new__form-inputs form-inputs">
                <label class="card-new__form-label form-label" for="form-input">
                  <input type="text" placeholder="Фамилия" name="second_name" id="form-input" class="card-new__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-new__form-label form-label" for="form-input">
                  <input type="text" placeholder="Имя" name="first_name" id="form-input" class="card-new__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-new__form-label form-label" for="form-input">
                  <input type="text" placeholder="Отчество" name="large_name" id="form-input" class="card-new__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-new__form-label form-label" for="form-input">
                  <input type="date" data-placeholder="Дата рождения" name="date" id="form-input" class="card-new__form-input form-input fa-regular fa-calendar-days _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-new__form-label form-label" for="form-input">
                  <input type="tel" placeholder="Номер телефона" name="tel" id="form-input" class="card-new__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-new__form-label form-label" for="form-input">
                  <input type="email" placeholder="Email" name="email" id="form-input" class="card-new__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
                <label class="card-new__form-label form-label" for="form-input">
                  <input type="text" placeholder="Серия и номер паспорта" name="passport" id="form-input" class="card-new__form-input form-input _required">
                  <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                </label>
              </div>
              <div class="card-new__form-block form-block">
                <div class="card-new__form-list form-list">
                  <h4 class="card-new__form-text form-text">Фото для пропуска</h4>
                  <p class="card-new__form-text form-text">Какое фото нужно добавить:</p>
                  <ul class="card-new__form-text form-text">
                    <li>размер 3 * 4 см</li>
                    <li>белый фон</li>
                    <li>видна голова и верхняя часть плеч</li>
                  </ul>
                </div>
                <div class="card-new__form-pic form-pic">
                  <div class="card-new__form-img form-img img">
                    <img src="../assets/img/no-img_bg-user.svg" id="chosen_image" alt="фото">
                  </div>
                  <div class="card-new__form-file form-file">
                    <p id="file_name">Фото не загружено</p>
                    <label class="card-new__form-button form-button" for="form-input_file">
                      <input type="file" accept=".jpeg, .png, .jpg" id="form-input_file" id='file' name="file" class="card-new__form-input form-input _required">
                      <span class="input__error"><!--ОШИБКА ПРИ ЗАПОЛНЕНИИ--></span>
                      <p>Выбрать</p>
                      <i class="fa-regular fa-folder-open"></i>
                    </label>
                  </div>
                </div>
              </div>
              <input type="submit" value="Создать" name="add-card" class="card-new__form-button form-button button">
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