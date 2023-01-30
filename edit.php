<?php
require "./system/init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    <?php
include 'pages/edit.php'; 
//include 'system/edit.php';
  ?>
<?php else : ?>
Доступ запрещен
<?php endif; ?>