<?php
header("Content-type: text/html; charset=ISO 8859-1", true);

SESSION_START();

if ((!isset($_SESSION['admin_number'])) and (!isset($_SESSION['admin_password']))){
  header('Location: ../login/index.php');
}else{
  header('Location: HomeRH/index.php');
}
