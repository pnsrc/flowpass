<?php
require "./system/init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    <?php
  include "./system/settings.php";
  include "./pages/settings.php";
  ?>
<?php else : ?>
Доступ запрещен
<?php endif; ?>