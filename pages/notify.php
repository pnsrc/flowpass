<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
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
    </header>
    <main>
      <section class="notify">
        <div class="notify__container container">
          <h1 class="notify__title title">Уведомления</h1>
          <div class="notify__wrapper wrapper_bg">
            <span>Только служебные уведомления</span>
            <div class="notify__rows">
                <div class="notify__row">
                    <div class="notify__body">
                        <i class="fa-regular fa-clock"></i>
                        <div class="notify__info">
                            <h3 class="notify__title title">Внимание!</h3>
                            <p class="notify__text">7 пропусков, у которых истекает срок активации через три дня</p>
                        </div>
                    </div>
                    <a href="" class="notify__link">Перейти</a>
                </div>
                <div class="notify__row">
                    <div class="notify__body">
                        <i class="fa-regular fa-trash-can"></i>
                        <div class="notify__info">
                            <h3 class="notify__title title">Внимание!</h3>
                            <p class="notify__text">7 пропусков, у которых истёк срок активации</p>
                        </div>
                    </div>
                    <a href="" class="notify__link">Перейти</a>
                </div>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
</body>

</html>