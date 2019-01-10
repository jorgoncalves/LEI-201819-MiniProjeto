<?php
header("Content-type: text/html; charset=ISO 8859-1", true);
SESSION_START();
if ((!isset($_SESSION['admin_number'])) AND (!isset($_SESSION['admin_password']))){
  header('Location: ../../login/index.php');
}
include '../../../connect-db/connect-db.php';

$update_ID_Contrato = $_GET['ID_Contrato'];
$update_Entrada = $_GET['HEntrada'];
$update_Saida = $_GET['HSaida'];

echo "<br />".$update_ID_Contrato."<br />".$update_Entrada.'<br />'.$update_Saida;

$sql_updateC = "UPDATE contrato SET
F_H_entrada='$update_Entrada', F_H_saida='$update_Saida'
WHERE ID_Contrato='$update_ID_Contrato'";
echo "<br />".$sql_updateC;

if ($ligacao->query($sql_updateC) === TRUE){
  echo "<br />Novo registro introduzido!";
  header('Location: ../../dadosFuncionarioRH.php');
}else{
  echo "Erro: ".$sql_updateC."<br>".$ligacao->error;
}
?>
