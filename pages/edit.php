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
    <header>
    <nav class="header__nav header__nav_black">
        <a href="/" class="header__logo">flowpass//</a>
      </nav>
      <nav class="header__nav">
        <ul class="header__list">
          <li><a href="/pass/make" class="header__link">Создать пропуск</a></li>
          <li><a href="/" class="header__link">Список пропусков</a></li>
          <li><a href="/search" class="header__link">Поиск</a></li>
          <li><a href="/notify" class="header__link">Уведомления</a></li>
          <li><a href="/settings" class="header__link">Настройки</a></li>
          <li><a href="/exit" class="header__link">Выход</a></li>
        </ul>
      </nav>
    </header>
    <main>
      <section class="card-red">
        <div class="card-red__container container">
          <h1 class="card-red__title title">Редактирование пропуска</h1>
          <div class="card-red__wrapper wrapper_bg">
            <h2 class="card-red__title form-title title">Введите данные пользователя</h2>
            <form class="card-red__form form" action="/pass/edit" method="post">
            <input type="hidden" name="id" id="id" value="<?php echo $pass->id;?>" placeholder="Имя">
              <div class="card-red__form-inputs form-inputs">
              <label for="form-input">
                  <input value="<?php echo $second_name; ?>" type="text" placeholder="Фамилия" name="second_name" id="form-input"
                    class="card-red__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input value="<?php echo $name; ?>" type="text" placeholder="Имя" name="first_name" id="form-input"
                    class="card-red__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input value="<?php echo $large_name; ?>" type="text" placeholder="Отчество" name="large_name" id="form-input"
                    class="card-red__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input value="<?php echo $birthday; ?>" type="date" data-placeholder="Дата рождения" name="date" id="form-input"
                    class="card-red__form-input form-input fa-regular fa-calendar-days" required>
                </label>
                <label for="form-input">
                  <input value="<?php echo $phone; ?>" type="tel" placeholder="Номер телефона" name="tel" id="form-input"
                    class="card-red__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input value="<?php echo $email; ?>" type="email" placeholder="Email" name="email" id="form-input"
                    class="card-red__form-input form-input" required>
                </label>
                <label for="form-input">
                  <input value="<?php echo $passport; ?>" type="text" placeholder="Серия и номер паспорта" name="passport" id="form-input"
                    class="card-red__form-input form-input" required>
                </label>
              </div>
              <input type="submit" value="Редактировать" name="red-card"
                class="card-red__form-button form-button button">
            </form>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="../assets/js/file-upload.js"></script>
</body>

</html>