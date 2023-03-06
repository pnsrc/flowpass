<?php
require "./system/init.php";
if (isset($_SESSION['logged_user'])) :
  include 'pages/edit.php';
else : ?>
  Доступ запрещен
<?php endif; ?>