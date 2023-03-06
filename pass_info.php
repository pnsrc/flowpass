<?php
require "./system/init.php";
if (isset($_SESSION['logged_user'])) :
  include 'pages/pass_info.php';
else : ?>
  Доступ запрещен
<?php endif; ?>