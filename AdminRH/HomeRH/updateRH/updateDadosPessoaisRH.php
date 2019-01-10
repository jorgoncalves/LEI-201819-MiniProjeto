<?php
header("Content-type: text/html; charset=ISO 8859-1", true);
SESSION_START();
if ((!isset($_SESSION['admin_number'])) AND (!isset($_SESSION['admin_password']))){
  header('Location: ../../login/index.php');
}
include '../../../connect-db/connect-db.php';

$update_IDSQL = $_GET['ID_Funcionario'];
$update_NomeSQL = $_GET['Nome'];
$update_DataNascimentoSQL = $_GET['DataNascimento'];
$update_ContactoSQL = $_GET['Contacto'];
$update_EmailSQL = $_GET['Email'];
echo "<br />".$update_IDSQL."<br />".$update_NomeSQL.'<br />'.$update_DataNascimentoSQL.'<br />'.$update_ContactoSQL.'<br />'.$update_EmailSQL;

$sql_updateDP = "UPDATE funcionario SET
Nome='$update_NomeSQL', DataNascimento='$update_DataNascimentoSQL', Contacto='$update_ContactoSQL', Email='$update_EmailSQL'
WHERE ID_Funcionario='$update_IDSQL'";
echo "<br />".$sql_updateDP;

if ($ligacao->query($sql_updateDP) === TRUE){
  echo "Novo registro introduzido!";
  header('Location: ../../dadosFuncionarioRH.php');
}else{
  echo "Erro: ".$sql_updateDP."<br>".$ligacao->error;
}
?>
