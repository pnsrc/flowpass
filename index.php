<?php
require "system/init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
  <?php
  include 'pages/home.php';
?>
<?php else : ?>
    <?php
    include "system/login.php";
    include 'pages/_index.php';
    ?>
<?php endif; ?>