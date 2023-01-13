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
      <section class="card-new">
        <div class="card-new__container container">
          <h1 class="card-new__title title">Создать пропуск</h1>
          <div class="card-new__wrapper wrapper_bg">
            <h2 class="card-new__title form-title title">Введите данные пользователя</h2>
            <form class="card-new__form form" enctype="multipart/form-data" action="" method="post">
              <div class="card-new__form-inputs form-inputs">
              <label for="form-input">
                  <input type="text" placeholder="Фамилия" name="second_name" id="form-input" class="card-new__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input type="text" placeholder="Имя" name="first_name" id="form-input" class="card-new__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input type="text" placeholder="Отчество" name="large_name" id="form-input" class="card-new__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input type="date" data-placeholder="Дата рождения" name="date" id="form-input" class="card-new__form-input form-input fa-regular fa-calendar-days" required>
                </label>
                <label for="form-input">
                  <input type="tel" placeholder="Номер телефона" name="tel" id="form-input" class="card-new__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input type="email" placeholder="Email" name="email" id="form-input" class="card-new__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input type="text" placeholder="Серия и номер паспорта" name="passport" id="form-input" class="card-new__form-input form-input" required>
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
                    <img id="chosen_image" alt="фото">
                  </div>
                  <div class="card-new__form-file form-file">
                    <p id="file_name">Фото не загружено</p>
                    <label class="card-new__form-button form-button" for="form-input_file">
                      <input type="file" accept=".jpeg, .png, .jpg" id="form-input_file" id='file' name="file" class="card-new__form-input form-input" required>
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
  <script src="../../assets/js/file-upload.js"></script>
</body>

</html>
