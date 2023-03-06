<?php if (isset($_SESSION['logged_user'])) :
  include 'system/2fa_auth.php';
  include 'system/components/otp.php';
  include 'pages/2fa_auth.php';
else : ?>
  Доступ запрещен
<?php endif; ?>