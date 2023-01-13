<?php
require "./system/init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
    <?php
    include 'pages/search.php';
  ?>
<?php else : ?>
Доступ запрещен
<?php endif; ?>