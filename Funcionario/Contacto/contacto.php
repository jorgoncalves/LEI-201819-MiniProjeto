<!DOCTYPE html>
<html lang="pt" dir="ltr">
<head>
  <meta charset="iso-8859-1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <title>Contacto</title>
  <link rel="stylesheet" href="contactoCss.css?v=<?php echo time(); ?>">
  <link rel="stylesheet" href="contactoCssMedia.css?v=<?php echo time(); ?>">
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
        <div class="div-header">
          <label class="descricao-form">Contacto</label>
        </div>
        <div class="div-dados-form">
          <label for="">Assunto</label>
          <br>
          <input type="text" class="formatacao-comum" name="mail_assunto" value="">
          <br>
          <label for="" id="formatacao-label-mensagem">Mensagem</label>
          <br>
          <textarea name="mail_mensagem" id="formatacao-mensagem" class="formatacao-comum" rows="4" cols="8"></textarea>

          <br>
          <input type="submit" class="formatacao-comum" name="submeter" value="Submeter">
        </form>
      </div>
    </div>
  </body>
  </html>
