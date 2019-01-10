<?php
  SESSION_START();
  setcookie("procuraFeita", "", time() - 3600,"/");
  SESSION_UNSET();
  SESSION_DESTROY();
  header('Location: ../login/index.php');
 ?>
