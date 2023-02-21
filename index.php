<?php
require "system/init.php";
?>
<?php if (isset($_SESSION['logged_user'])) : ?>
  <?php
  // Redirect to home
  header('Location: /home');
?>
<?php else : ?>
    <?php
    include "system/login.php";
    include 'pages/_index.php';
    ?>
<?php endif; ?>