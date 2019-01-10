<?php
session_start();
header("Content-type: text/html; charset=ISO 8859-1", true);

if (isset($_POST['submeter'])){
  $de = $_SESSION['funcionario']['Email'];
  $para = 'jorge.g.geral@gmail.com';
  $assunto = $_POST['mail_assunto'];
  $mensagem = '<strong>Esta mensagem foi enviada por:</strong><br>'.$de.'<br><strong>Com a seguinte mensagem:</strong><br>'.$_POST['mail_mensagem'];
  $cabecalho = array(
    'Content-type' => ' text/html; charset=iso-8859-1',
    'From' => $de,
    'Reply-To' => $de,
    'X-Mailer' => 'PHP/' . phpversion()
  );
  mail($para, $assunto, $mensagem, $cabecalho);
  header('Location: ../Home/index.php');
}
?>
