<?php
require "./system/init.php";
if (isset($_SESSION['logged_user'])) : ?>
  Доступ запрещен
<? else :
  include "./system/signup.php";
  include "./pages/reg.php";
endif; ?>