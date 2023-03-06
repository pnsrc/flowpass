<?php
require "./system/init.php";
if (isset($_SESSION['logged_user'])) :
  include "./system/settings.php";
  include "./pages/settings.php";
else : ?>
  Доступ запрещен
<?php endif; ?>