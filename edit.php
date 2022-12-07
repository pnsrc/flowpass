<?php
require "./system/init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    <?php
include 'system/edit.php';

include 'pages/edit.php';
  ?>
<?php else : ?>
Доступ запрещен
<?php endif; ?>