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
    <? include 'components/header.php' ?>
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
  <script src="../assets/libs/jquery/jquery-3.6.3.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>