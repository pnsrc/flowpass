<?php
require "./system/init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    <?php
include 'system/make.php';

include 'pages/new_pass.php';
  ?>
<?php else : ?>
Доступ запрещен
<?php endif; ?>