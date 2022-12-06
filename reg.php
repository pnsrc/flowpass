<?php
require "./system/init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
Доступ запрещен
<?php else : ?>
  <?php
  include "./system/signup.php";
  include "./pages/reg.php";
  ?>
<?php endif; ?>