<?php
header("Content-type: text/html; charset=ISO 8859-1", true);
include '../../../connect-db/connect-db.php';

$insert_ID_Funcionario = $_GET['ID_Funcionario'];
$insert_Titulo = $_GET['Titulo'];
$insert_Local = $_GET['Local'];
echo "ID_Funcionario= ".$insert_ID_Funcionario."<br />"."Titulo= ".$insert_Titulo."<br />"."Local= ".$insert_Local;
$sql_insert="INSERT INTO curriculum (ID_Funcionario, Titulo, LocalForm) VALUES ('$insert_ID_Funcionario','$insert_Titulo','$insert_Local')";

if ($ligacao->query($sql_insert) === TRUE) {
  echo "<br />"."Sucess!!";
  header("Location: ../../dadosFUncionario.php");
} else {
  echo "Erro SQL: ".$sql_insert."<br>Erro ligação: ".$ligacao->error;
}
?>
