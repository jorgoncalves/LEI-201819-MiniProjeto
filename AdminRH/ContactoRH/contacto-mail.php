<?php
session_start();
header("Content-type: text/html; charset=ISO 8859-1", true);

if (isset($_POST['submeter'])){
  $numero_admin = $_SESSION["admin_number"];

  include '../../connect-db/connect-db.php';
  $sql_admin_email = 'SELECT email FROM funcionario WHERE ID_Funcionario = '.$numero_admin;
  $resultado_admin_email = $ligacao->query($sql_admin_email) or die ($ligacao->error);
  $registo = $resultado_admin_email->fetch_array(MYSQLI_ASSOC);

  $de = 'a'.$numero_admin.' com o email pessoal: '.$registo['email'];
  $para = 'jorge.g.geral@gmail.com';
  $assunto = $_POST['mail_assunto'];
  $mensagem =
  '<strong>Esta mensagem foi enviada pelo administrador RH:</strong><br>'.$de.
  '<br><br />
  <strong>Com a seguinte mensagem:</strong><br>'.$_POST['mail_mensagem'];
  $cabecalho = array(
    'Content-type' => ' text/html; charset=iso-8859-1',
    'From' => $de,
    'Reply-To' => $de,
    'X-Mailer' => 'PHP/' . phpversion()
  );
  mail($para, $assunto, $mensagem, $cabecalho);
  header('Location: ../HomeRH/index.php');
}
?>
