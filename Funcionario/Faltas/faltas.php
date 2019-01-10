<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="iso-8859-1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Faltas</title>
</head>
<body>
  <?php
  header("Content-type: text/html; charset=ISO 8859-1", true);
  SESSION_START();
  if ((!isset($_SESSION['user_number'])) AND (!isset($_SESSION['user_password']))){
    header('Location: ../../login/index.php');
  }
  ?>
  <div id="div_nav"></div>
  <script>
  $("#div_nav").load("../../nav/nav-plus-css.php");
  </script>
</body>
</html>
