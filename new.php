<?php
require "./system/init.php";
if (isset($_SESSION['logged_user'])) :
  include 'pages/new_pass.php';
else : ?>
  Доступ запрещен
<?php endif; ?>