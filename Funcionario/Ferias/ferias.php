<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="iso-8859-1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="feriasCss.css?v=<?php echo time(); ?>">
  <title>Ferias</title>
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

  <div id="div-conteudo-home">
    <form class="form-conteudo" action="contacto-mail.php" method="post">
      <div class="div-dados-form">
        <iframe src="https://calendar.google.com/calendar/b/1/embed?showTitle=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;mode=WEEK&amp;height=500&amp;wkst=1&amp;bgcolor=%23FFFFFF&amp;src=h891eltjdtmhj07sj2n8vsh5s0%40group.calendar.google.com&amp;color=%23125A12&amp;ctz=Europe%2FLisbon" style="border-width:0" width="600" height="500" frameborder="0" scrolling="no"></iframe>
    </div>
  </form>
  </div>

</body>
</html>
