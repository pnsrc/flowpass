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
      <section class="card-list">
        <div class="card-list__container container">
          <h1 class="card-list__title title">Список пропусков</h1>
          <div class="card-list__wrapper wrapper_bg">
            <!--Вывод пропусков-->
            <? require('../system/pass-load.php');
            require('../system/buttons_page.php'); ?>
            <div class="card-list__overflow overflow-x">
              <table class="card-list__table">
                <thead>
                  <tr>
                    <th class="card-list__id">ID</th>
                    <th class="card-list__fio">ФИО</th>
                    <th class="card-list__status">Статус</th>
                    <th class="card-list__date">Дата активации</th>
                    <th class="card-list__date">Дата окончания</th>
                    <th class="card-list__link-head">Переход к пропуску</th>
                  </tr>
                </thead>
                <tbody>
                  <? if (count($paged_passes)) {
                    foreach ($paged_passes as $pass) { ?>
                      <tr>
                        <td><?= $pass['id'] ?></td>
                        <td><?= $pass['fio'] ?></td>
                        <td><?= $pass['status'] == 'valid' ? 'Действующий' : 'Просрочен' ?></td>
                        <td><?= $pass['date_activation'] ?></td>
                        <td><?= $pass['date_expiration'] ?></td>
                        <td><a href="/pass/view?id=<?= $pass['id'] ?>" class="card-list__link">Перейти</a></td>
                      </tr>
                  <? }
                  } else {
                    echo '<p class="card-list__nav alert alert-warning">Ничего не найдено</p>';
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </section>
    </main>
  </div>
  <script src="../assets/libs/jquery/jquery-3.6.3.js"></script>
  <script src="../assets/js/pages.js"></script>
  <script src="../assets/js/script.js"></script>
</body>

</html>