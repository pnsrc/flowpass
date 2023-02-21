<?php
require "./system/init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    <?php
    include 'pages/pass_info.php';
  ?>
<?php else : ?>
Доступ запрещен
<?php endif; ?>