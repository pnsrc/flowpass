<?php
require "system/init.php";
if (isset($_SESSION['logged_user'])) :
  // Redirect to home
  header('Location: /home');
else :
  include "system/login.php";
  include 'pages/_index.php';

endif;
